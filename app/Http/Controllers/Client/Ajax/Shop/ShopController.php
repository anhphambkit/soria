<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 10:06
 */

namespace App\Http\Controllers\Client\Ajax\Shop;


use App\Core\Controllers\CoreAjaxController;
use App\Core\Response\Response;
use App\Http\Requests\Shop\CreateAddressShippingRequest;
use App\Packages\Admin\Product\Services\GuestInfoServices;
use App\Packages\Admin\Product\Services\ShoppingCartServices;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\Shop\Services\AddressBookServices;
use App\Packages\SystemGeneral\Services\HelperServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ShopController extends CoreAjaxController {

    private $helperServices;
    private $productServices;
    private $shoppingCartServices;
    private $guestInfoServices;
    private $addressBookServices;
    protected $userId;
    protected $isGuest;
    public function __construct(HelperServices $helperServices, ProductServices $productServices,
                                ShoppingCartServices $shoppingCartServices, GuestInfoServices $guestInfoServices,
                                AddressBookServices $addressBookServices)
    {
        $this->helperServices = $helperServices;
        $this->productServices = $productServices;
        $this->shoppingCartServices = $shoppingCartServices;
        $this->guestInfoServices = $guestInfoServices;
        $this->addressBookServices = $addressBookServices;
        $this->isGuest = true;
        if (Auth::check()) {
            $this->userId = Auth::id();
            $this->isGuest = false;
        }
        else {
            $this->userId = Cookie::get('guest_id');
        }
    }

    /**
     * @param Request $request
     * @param int|null $userId
     * @return int|mixed
     */
    public function checkUserId(Request $request, int $userId = null) {
        if (empty($userId)) {
            $ip = $request->ip();
            $userId = $this->guestInfoServices->createGuest($ip);
        }
        return $userId;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function addOrUpdateProductsToCartOfUser(Request $request) {
        $isUpdate = $request->get('is_update_product');
        $this->userId = $this->checkUserId($request, $this->userId);
        $products = $request->get('products');
        $this->shoppingCartServices->addOrUpdateProductsToCartOfUser($products, $this->userId, $this->isGuest, $isUpdate);
        $basicInfoCart = $this->shoppingCartServices->getBasicInfoCartOfUser($this->userId, $this->isGuest);
        if ($this->isGuest)
            return $this->response($basicInfoCart, Response::STATUS_SUCCESS, trans('generals.update_cart_success'))->withCookie(Cookie::forever('guest_id', $this->userId));
        else
            return $this->response($basicInfoCart, Response::STATUS_SUCCESS, trans('generals.update_cart_success'));

    }

    /**
     * @param Request $request
     * @return ShopController|\Illuminate\Http\JsonResponse
     */
    public function viewCartHeader(Request $request) {
        $this->userId = $this->checkUserId($request, $this->userId);
        $basicInfoCart = $this->shoppingCartServices->getBasicInfoCartOfUser($this->userId, $this->isGuest);
        if ($this->isGuest)
            return $this->response($basicInfoCart, Response::STATUS_SUCCESS, trans('generals.success'));
        else
            return $this->response($basicInfoCart, Response::STATUS_SUCCESS, trans('generals.success'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProductInCart(Request $request) {
        $productId = $request->get('product_id');
        $this->userId = $this->checkUserId($request, $this->userId);
        $this->shoppingCartServices->deleteProductInCart($productId, $this->userId, $this->isGuest);
        $basicInfoCart = $this->shoppingCartServices->getBasicInfoCartOfUser($this->userId, $this->isGuest);
        if ($this->isGuest)
            return $this->response($basicInfoCart, Response::STATUS_SUCCESS, trans('generals.delete_product_in_cart_success'))->withCookie(Cookie::forever('guest_id', $this->userId));
        else
            return $this->response($basicInfoCart, Response::STATUS_SUCCESS, trans('generals.delete_product_in_cart_success'));
    }

    /**
     * @param CreateAddressShippingRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAddressShipping(CreateAddressShippingRequest $request) {
        $data = $request->all();
        $this->userId = $this->checkUserId($request, $this->userId);
        $this->addressBookServices->createNewAddressBook($data, $this->userId, $this->isGuest);
        $addressBooks = $this->addressBookServices->getAddressBooks($this->userId, $this->isGuest);
        if ($this->isGuest)
            return $this->response([
                'addressBooks' => $addressBooks
            ], Response::STATUS_SUCCESS, trans('generals.create_address_shipping_success'))->withCookie(Cookie::forever('guest_id', $this->userId));
        else
            return $this->response([
                'addressBooks' => $addressBooks
            ], Response::STATUS_SUCCESS, trans('generals.create_address_shipping_success'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAddressShipping(Request $request) {
        $addressId = $request->get('address_id');
        $this->userId = $this->checkUserId($request, $this->userId);
        $this->addressBookServices->deleteAddressShipping($addressId, $this->userId, $this->isGuest);
        $addressBooks = $this->addressBookServices->getAddressBooks($this->userId, $this->isGuest);
        if ($this->isGuest)
            return $this->response([
                'addressBooks' => $addressBooks
            ], Response::STATUS_SUCCESS, trans('generals.delete_address_shipping_success'))->withCookie(Cookie::forever('guest_id', $this->userId));
        else
            return $this->response([
                'addressBooks' => $addressBooks
            ], Response::STATUS_SUCCESS, trans('generals.delete_address_shipping_success'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAddressShipping(Request $request) {
        $data = $request->all();
        $this->userId = $this->checkUserId($request, $this->userId);
        $this->addressBookServices->updateAddressBook($data, $this->userId, $this->isGuest);
        $addressBooks = $this->addressBookServices->getAddressBooks($this->userId, $this->isGuest);
        if ($this->isGuest)
            return $this->response([
                'addressBooks' => $addressBooks
            ], Response::STATUS_SUCCESS, trans('generals.update_address_shipping_success'))->withCookie(Cookie::forever('guest_id', $this->userId));
        else
            return $this->response([
                'addressBooks' => $addressBooks
            ], Response::STATUS_SUCCESS, trans('generals.update_address_shipping_success'));
    }

    public function shipToThisAddress(Request $request) {
//        $data = $request->all();
//        $this->userId = $this->checkUserId($request, $this->userId);
//        $this->addressBookServices->updateAddressBook($data, $this->userId, $this->isGuest);
//        $addressBooks = $this->addressBookServices->getAddressBooks($this->userId, $this->isGuest);
//        if ($this->isGuest)
//            return $this->response([
//                'addressBooks' => $addressBooks
//            ], Response::STATUS_CUSTOM_ERROR, trans('generals.update_cart_success'))->withCookie(Cookie::forever('guest_id', $this->userId));
//        else
//            return $this->response([
//                'addressBooks' => $addressBooks
//            ], Response::STATUS_CUSTOM_ERROR, trans('generals.update_cart_success'));
    }
}
