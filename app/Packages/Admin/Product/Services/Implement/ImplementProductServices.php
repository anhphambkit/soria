<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:32
 */

namespace App\Packages\Admin\Product\Services\Implement;

use App\Packages\Admin\Product\Repositories\ProductRepository;
use App\Packages\Admin\Product\Services\ProductServices;

class ImplementProductServices implements ProductServices {

    private $repository;

    /**
     * ImplementProductCategoryServices constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function createProduct($data)
    {
        // TODO: Implement createProduct() method.
        $this->repository->createProduct($data);
    }

    /**
     * @return mixed
     */
    public function getAllProducts()
    {
        // TODO: Implement getAllProducts() method.
        return $this->repository->getAllProducts();
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function getDetailProduct($productId) {
        // TODO: Implement getDetailProduct() method.
        return $this->repository->getDetailProduct($productId);
    }

    /**
     * @param $productId
     * @param $data
     * @return mixed
     */
    public function updateProduct($productId, $data) {
        unset($data['id']);
        return $this->repository->updateProduct($productId, $data);
    }
}