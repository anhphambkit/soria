<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 11:54
 */

namespace App\Packages\Admin\Services\Implement;

use App\Packages\Admin\Repositories\Eloquent\EloquentProductCategoryRepository;
use App\Packages\Admin\Services\ProductCategoryServices;

class ImplementProductCategoryServices implements ProductCategoryServices{

    private $repository;

    /**
     * ImplementProductCategoryServices constructor.
     * @param EloquentProductCategoryRepository $productCategoryRepository
     */
    public function __construct(EloquentProductCategoryRepository $productCategoryRepository)
    {
        $this->repository = $productCategoryRepository;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function createProductCategory($data)
    {
        // TODO: Implement createCategory() method.
        $this->repository->createProductCategory($data);
    }

    /**
     * @return mixed
     */
    public function getAllProductCategory()
    {
        // TODO: Implement getAllCategory() method.
        return $this->repository->getAllProductCategory();
    }

    /**
     * @param $productCategoryId
     * @return mixed
     */
    public function getDetailProductCategory($productCategoryId) {
        // TODO: Implement getDetailProductCategory() method.
        return $this->repository->getDetailProductCategory($productCategoryId);
    }

    /**
     * @param $productCategoryId
     * @param $data
     * @return mixed
     */
    public function updateProductCategory($productCategoryId, $data) {
        unset($data['id']);
        return $this->repository->updateProductCategory($productCategoryId, $data);
    }
}