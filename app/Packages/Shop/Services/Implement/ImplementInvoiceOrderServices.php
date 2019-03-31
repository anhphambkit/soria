<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 12:38
 */

namespace App\Packages\Shop\Services\Implement;


use App\Mail\OrderNotifyAdminShop;
use App\Mail\OrderNotifyCustomer;
use App\Packages\Admin\Product\Services\ShippingFeeServices;
use App\Packages\Admin\Product\Services\ShoppingCartServices;
use App\Packages\Shop\Repositories\InvoiceOrderRepository;
use App\Packages\Shop\Services\AddressBookServices;
use App\Packages\Shop\Services\InvoiceOrderServices;
use App\Packages\Shop\Services\ProductsInOrderServices;
use App\Packages\SystemGeneral\Constants\SettingConfig;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ImplementInvoiceOrderServices implements InvoiceOrderServices
{
    private $invoiceOrderRepository;
    private $shoppingCartServices;
    private $addressBookServices;
    private $productsInOrderServices;
    private $generalSettingServices;
    private $shippingFeeServices;

    /**
     * ImplementInvoiceOrderServices constructor.
     * @param InvoiceOrderRepository $invoiceOrderRepository
     * @param ShoppingCartServices $shoppingCartServices
     * @param AddressBookServices $addressBookServices
     * @param ProductsInOrderServices $productsInOrderServices
     * @param GeneralSettingServices $generalSettingServices
     * @param ShippingFeeServices $shippingFeeServices
     */
    public function __construct(InvoiceOrderRepository $invoiceOrderRepository, ShoppingCartServices $shoppingCartServices,
                                AddressBookServices $addressBookServices, ProductsInOrderServices $productsInOrderServices,
                                GeneralSettingServices $generalSettingServices, ShippingFeeServices $shippingFeeServices
    )
    {
        $this->invoiceOrderRepository = $invoiceOrderRepository;
        $this->shoppingCartServices = $shoppingCartServices;
        $this->addressBookServices = $addressBookServices;
        $this->productsInOrderServices = $productsInOrderServices;
        $this->generalSettingServices = $generalSettingServices;
        $this->shippingFeeServices = $shippingFeeServices;
    }

    /**
     * @param array $dataCheckouts
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function createNewInvoiceOrder(array $dataCheckouts, int $userId, bool $isGuest) {
        try {
            $now = Carbon::now();
            // Current Cart:
            $cart = $this->shoppingCartServices->getProductsInCartToOrder($userId, $isGuest);
            // Current shipping address
            $shippingAddress = $this->addressBookServices->getDetailAddressShippingSelected($userId, $isGuest);

            // Get fee shipping:
            $shippingFee = $this->shippingFeeServices->getShippingFee($cart['total_price'], $shippingAddress->province_city_code, $shippingAddress->district_code, $shippingAddress->ward_code);

            // Prepare data for create new order
            $dataOrder = [
                  'user_id' => $userId,
                  'is_guest' => $isGuest,
                  'customer' => $shippingAddress->full_name,
                  'email' => $shippingAddress->email,
                  'mobile_phone' => $shippingAddress->mobile_phone,
                  'address' => "{$shippingAddress->address}, {$shippingAddress->district_name}, {$shippingAddress->province_city_name}, {$shippingAddress->ward_name}",
                  'shipping_method' => $dataCheckouts['shipping_method'],
                  'payment_method' => $dataCheckouts['payment_method'],
                  'sub_total' => $cart['sub_total'],
                  'discount_on_products' => $cart['discount_on_products'],
                  'total_price' => $cart['total_price'] + $shippingFee,
                  'is_home' => $shippingAddress->is_home,
                  'shipping_fee' => $shippingFee,
                  'is_free_shipping' => ($shippingFee > 0) ? false : true,
                  'updated_at' => $now,
                  'created_at' => $now,
            ];
            return DB::transaction(function () use ($dataOrder, $cart, $userId, $isGuest) {
                // Create new Order:
                $orderId = $this->invoiceOrderRepository->createNewInvoiceOrder($dataOrder);
                // Products:
                $productsInOder = $this->prepareProductsDataInOrder($cart['products']->toArray(), $orderId);
                // Insert products in cart to order:
                $this->productsInOrderServices->insertProductsInOrder($productsInOder['products']);
                // Delete products in cart:
                $this->shoppingCartServices->deleteListProductInCart($productsInOder['id_products'], $userId, $isGuest);
                return $orderId;
            }, 3);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param array $products
     * @param int $userId
     * @param bool $isGuest
     * @return array
     * @throws \Exception
     */
    public function prepareProductsDataInOrder(array $products, int $orderId) {
        try {
            $now = Carbon::now();
            $idProducts = [];
            foreach ($products as $index => $product) {
                $products[$index]['order_id'] = $orderId;
                $products[$index]['product_id'] = $product['id'];
                $products[$index]['categories'] = json_encode($product['categories']);
                $products[$index]['medias'] = json_encode($product['medias']);
                $products[$index]['updated_at'] = $now;
                $products[$index]['created_at'] = $now;
                $idProducts[] = $product['id'];
                unset($products[$index]['id']);
            }
            return [
                'products' => $products,
                'id_products' => $idProducts
            ];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @return mixed
     */
    public function getListOrdersToManage() {
        return $this->invoiceOrderRepository->getListOrdersToManage();
    }

    /**
     * @param int $orderId
     * @return mixed
     */
    public function getDetailInvoiceOrder(int $orderId) {
        return $this->invoiceOrderRepository->getDetailInvoiceOrder($orderId);
    }

    /**
     * @param int $orderId
     * @return mixed|void
     * @throws \Exception
     */
    public function sendEmailNotifyNewOrder(int $orderId) {
        try {
            $shopSettings =  $this->generalSettingServices->getAllSettingsForRenderByTypeWeb(SettingConfig::SHOP);
            $detailOrder = $this->invoiceOrderRepository->getDetailInvoiceOrder($orderId);
            $orderProducts = $this->productsInOrderServices->getAllProductsInOrder($orderId);
            // Email to customer:
            Mail::to($detailOrder->email)->send(new OrderNotifyCustomer($shopSettings, $detailOrder, $orderProducts));
            // Email to Admin:
            Mail::to(config('mail.admin.to'))->cc(explode(',', config('mail.admin.cc')))->send(new OrderNotifyAdminShop($shopSettings, $detailOrder, $orderProducts));
            return;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}