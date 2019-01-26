<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 12:30
 */

namespace App\Packages\Admin\Product\Repositories;

interface CartUserRepository {
    /**
     * @param int $productId
     * @param int $quantity
     * @param int $userId
     * @return mixed
     */
    public function addToCartOfUser(int $productId, int $quantity = 1, int $userId = 0);
}