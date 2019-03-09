<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 12:38
 */

namespace App\Packages\Shop\Services;


interface ProductsInOrderServices
{
    /**
     * @param array $data
     * @return mixed
     */
    public function insertProductsInOrder(array $data);

    /**
     * @param int $orderId
     * @return mixed
     */
    public function getAllProductsInOrder(int $orderId);
}