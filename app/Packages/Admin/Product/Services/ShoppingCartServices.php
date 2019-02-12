<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 12:28
 */

namespace App\Packages\Admin\Product\Services;

use Illuminate\Database\Eloquent\Collection;

interface ShoppingCartServices {
    /**
     * @param array $products
     * @param int $userId
     * @param bool $isGuest
     * @param bool $isUpdate
     * @throws \Exception
     */
    public function addOrUpdateProductsToCartOfUser(array $products, int $userId = 0, bool $isGuest = true, bool $isUpdate = true);

    /**
     * @param int|null $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function getBasicInfoCartOfUser(int $userId = null, bool $isGuest = true);

    /**
     * @param array $products
     * @param array $cart
     * @return mixed
     */
    public function getBasicInfoCartFromClient(array $products, array $cart);

    /**
     * @param Collection $products
     * @return mixed
     * @throws \Exception
     */
    public function calculatorTotalPrice(Collection $products);

    /**
     * @param array $products
     * @param array $cart
     * @return array
     * @throws \Exception
     */
    public function updateProductsIntoCartList(array $products, array $cart);

    /**
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function getTotalItemsInCart(int $userId, bool $isGuest = true);
}