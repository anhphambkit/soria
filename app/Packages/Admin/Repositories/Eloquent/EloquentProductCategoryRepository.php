<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 13:55
 */

namespace App\Packages\Admin\Repositories\Eloquent;

use App\Packages\Admin\Entities\ProductCategory;
use App\Packages\Admin\Entities\ProductCategoryRelation;
use App\Packages\Admin\Repositories\ProductCategoryRepository;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class EloquentProductCategoryRepository implements ProductCategoryRepository {

    private $model;
    private $productCategoryRelation;
    public function __construct(ProductCategory $productCategory, ProductCategoryRelation $productCategoryRelation)
    {
        $this->model = $productCategory;
        $this->productCategoryRelation = $productCategoryRelation;
    }

    public function getAllProductCategory()
    {
        // TODO: Implement getAllProductCategory() method.
        return $this->model
                    ->select('id', 'name', 'slug')
                    ->orderBy('name', 'asc')
                    ->get();
    }

    public function createProductCategory($data) {
        try {
            return $this->model->create($data);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }
}