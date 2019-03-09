<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 12:40
 */

namespace App\Packages\Shop\Repositories\Eloquent;


use App\Packages\Shop\Entities\ProductsInOrder;
use App\Packages\Shop\Repositories\ProductsInOrderRepository;

class EloquentProductsInOrderRepository implements ProductsInOrderRepository
{
    private $productsInOrderModel;

    /**
     * EloquentProductsInOrderRepository constructor.
     * @param ProductsInOrder $productsInOrderModel
     */
    public function __construct(ProductsInOrder $productsInOrderModel)
    {
        $this->productsInOrderModel = $productsInOrderModel;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function insertProductsInOrder(array $data) {
        try {
            return $this->productsInOrderModel->insert($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $orderId
     * @return mixed
     * @throws \Exception
     */
    public function getAllProductsInOrder(int $orderId) {
        try {
            $query = $this->productsInOrderModel->select('*')->where('order_id', $orderId)->get();
            return $query;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}