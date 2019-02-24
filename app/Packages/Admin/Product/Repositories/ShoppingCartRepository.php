<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 12:30
 */

namespace App\Packages\Admin\Product\Repositories;

interface ShoppingCartRepository {
    /**
     * @param int $productId
     * @param int $quantity
     * @param int $userId
     * @param bool $isGuest
     * @param bool $isUpdate
     * @return mixed
     */
    public function addOrUpdateProductsToCartOfUser(int $productId, int $quantity = 1, int $userId = 0, bool $isGuest = true, bool $isUpdate = true);

    /**
     * @param int|null $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function getBasicInfoCartOfUser(int $userId = null, bool $isGuest = true);

    /**
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     */
    public function getTotalItemsInCart(int $userId, bool $isGuest = true);

    /**
     * @param array $idProducts
     * @param int|null $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function deleteListProductInCart(array $idProducts, int $userId = null, bool $isGuest = true);
}