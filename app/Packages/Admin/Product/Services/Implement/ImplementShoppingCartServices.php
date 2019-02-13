<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 12:28
 */

namespace App\Packages\Admin\Product\Services\Implement;

use App\Packages\Admin\Product\Repositories\ShoppingCartRepository;
use App\Packages\Admin\Product\Services\ShoppingCartServices;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\SystemGeneral\Repositories\CoreDBRepository;
use Illuminate\Database\Eloquent\Collection;

class ImplementShoppingCartServices implements ShoppingCartServices {

    private $cartUserRepository;
    private $coreDBRepository;
    private $productServices;

    /**
     * ImplementProductCategoryServices constructor.
     * @param ShoppingCartRepository $cartUserRepository
     * @param CoreDBRepository $coreDBRepository
     * @param ProductServices $productServices
     */
    public function __construct(ShoppingCartRepository $cartUserRepository, CoreDBRepository $coreDBRepository, ProductServices $productServices)
    {
        $this->cartUserRepository = $cartUserRepository;
        $this->coreDBRepository = $coreDBRepository;
        $this->productServices = $productServices;
    }

    /**
     * @param array $products
     * @param int $userId
     * @param bool $isGuest
     * @param bool $isUpdate
     * @throws \Exception
     */
    public function addOrUpdateProductsToCartOfUser(array $products, int $userId = 0, bool $isGuest = true, bool $isUpdate = true) {
        try {
            foreach ($products as $productId => $quantity) {
                $quantity = intval($quantity) > 0 ? intval($quantity) : 1;
                $this->cartUserRepository->addOrUpdateProductsToCartOfUser(intval($productId), $quantity, $userId, $isGuest, $isUpdate);
            }
            return;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int|null $userId
     * @param bool $isGuest
     * @return array|mixed
     * @throws \Exception
     */
    public function getBasicInfoCartOfUser(int $userId = null, bool $isGuest = true) {
        try {
            $products = $this->cartUserRepository->getBasicInfoCartOfUser($userId, $isGuest);
            $totalItems = $products->sum('quantity');
            $totalPrice = $this->calculatorTotalPrice($products);
            return [
                'products' => $products,
                'total_items' => $totalItems,
                'total_price' => $totalPrice
            ];
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param array $products
     * @param array $cart
     * @return array|mixed
     * @throws \Exception
     */
    public function getBasicInfoCartFromClient(array $products, array $cart) {
        try {
            $cartProducts = $this->updateProductsIntoCartList($products, $cart);
            $productIds = array_keys($cartProducts);
            $products = $this->productServices->getProductsInCartFromProductIds($productIds, $cartProducts);
            $totalItems = $products->sum('quantity');
            $totalPrice = $this->calculatorTotalPrice($products);
            return [
                'products' => $products,
                'total_items' => $totalItems,
                'total_price' => $totalPrice
            ];
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param Collection $products
     * @return mixed
     * @throws \Exception
     */
    public function calculatorTotalPrice(Collection $products) {
        try {
            $total = $products->sum(function ($product) {
                $price = ($product->sale_price) ? $product->sale_price : $product->price;
                return $price*$product->quantity;
            });
            return $total;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param array $products
     * @param array $cart
     * @return array
     * @throws \Exception
     */
    public function updateProductsIntoCartList(array $products, array $cart) {
        try {
            foreach ($products as $productId => $quantity) {
                if (array_key_exists($productId, $cart)) {
                    $cart[$productId] += $quantity;
                }
                else {
                    $cart[$productId] = $quantity;
                }
            }
            return $cart;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $userId
     * @param bool $isGuest
     * @return array|mixed
     * @throws \Exception
     */
    public function getTotalItemsInCart(int $userId, bool $isGuest = true)
    {
        try {
            $totalItems = $this->cartUserRepository->getTotalItemsInCart($userId, $isGuest);
            return $totalItems;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $productId
     * @param int $userId
     * @param bool $isGuest
     * @param bool $isUpdate
     * @return mixed
     * @throws \Exception
     */
    public function deleteProductInCart(int $productId, int $userId = 0, bool $isGuest = true, bool $isUpdate = true) {
        try {
            return $this->cartUserRepository->addOrUpdateProductsToCartOfUser($productId, 0, $userId, $isGuest, $isUpdate);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}