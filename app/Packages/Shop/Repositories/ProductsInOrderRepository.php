<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 12:40
 */

namespace App\Packages\Shop\Repositories;


interface ProductsInOrderRepository
{
    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function insertProductsInOrder(array $data);

    /**
     * @param int $orderId
     * @return mixed
     */
    public function getAllProductsInOrder(int $orderId);
}