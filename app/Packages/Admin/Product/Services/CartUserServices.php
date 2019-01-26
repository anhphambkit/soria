<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 12:28
 */

namespace App\Packages\Admin\Product\Services;

interface CartUserServices {
    /**
     * @param array $products
     * @param int $userId
     * @return mixed
     */
    public function addProductsToCartOfUser(array $products, int $userId = 0);
}