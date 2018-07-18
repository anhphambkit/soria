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

    public function __construct(EloquentProductCategoryRepository $productCategoryRepository)
    {
        $this->repository = $productCategoryRepository;
    }

    public function createProductCategory($data)
    {
        // TODO: Implement createCategory() method.
        $this->repository->createProductCategory($data);
    }

    public function getAllProductCategory()
    {
        // TODO: Implement getAllCategory() method.
        return $this->repository->getAllProductCategory();
    }
}