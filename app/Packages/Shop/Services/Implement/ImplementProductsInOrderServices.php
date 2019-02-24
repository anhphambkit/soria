<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 12:38
 */

namespace App\Packages\Shop\Services\Implement;


use App\Packages\Shop\Repositories\ProductsInOrderRepository;
use App\Packages\Shop\Services\ProductsInOrderServices;

class ImplementProductsInOrderServices implements ProductsInOrderServices
{
    private $productsInOrderRepository;

    /**
     * ImplementProductsInOrderServices constructor.
     * @param ProductsInOrderRepository $productsInOrderRepository
     */
    public function __construct(ProductsInOrderRepository $productsInOrderRepository)
    {
        $this->productsInOrderRepository = $productsInOrderRepository;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function insertProductsInOrder(array $data) {
        try {
            return $this->productsInOrderRepository->insertProductsInOrder($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}