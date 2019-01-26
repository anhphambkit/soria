<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 12:28
 */

namespace App\Packages\Admin\Product\Services\Implement;

use App\Packages\Admin\Product\Repositories\CartUserRepository;
use App\Packages\Admin\Product\Services\CartUserServices;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\SystemGeneral\Repositories\CoreDBRepository;
use Illuminate\Database\Eloquent\Collection;

class ImplementCartUserServices implements CartUserServices {

    private $repository;
    private $coreDBRepository;
    private $productServices;

    /**
     * ImplementProductCategoryServices constructor.
     * @param CartUserRepository $cartUserRepository
     * @param CoreDBRepository $coreDBRepository
     * @param ProductServices $productServices
     */
    public function __construct(CartUserRepository $cartUserRepository, CoreDBRepository $coreDBRepository, ProductServices $productServices)
    {
        $this->repository = $cartUserRepository;
        $this->coreDBRepository = $coreDBRepository;
        $this->productServices = $productServices;
    }

    /**
     * @param array $products
     * @param int $userId
     * @return mixed|void
     * @throws \Exception
     */
    public function addProductsToCartOfUser(array $products, int $userId = 0) {
        try {
            foreach ($products as $productId => $quantity) {
                $quantity = intval($quantity) > 0 ? intval($quantity) : 1;
                $this->repository->addToCartOfUser(intval($productId), $quantity, $userId);
            }
            return;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $userId
     * @return mixed
     * @throws \Exception
     */
    public function getBasicInfoCartOfUser(int $userId) {
        try {
            $products = $this->repository->getBasicInfoCartOfUser($userId);
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
}