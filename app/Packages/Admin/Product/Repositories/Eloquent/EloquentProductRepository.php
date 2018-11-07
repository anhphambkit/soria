<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:35
 */

namespace App\Packages\Admin\Product\Repositories\Eloquent;

use App\Packages\Admin\Product\Entities\Product;
use App\Packages\Admin\Product\Entities\ProductCategoryRelation;
use App\Packages\Admin\Product\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class EloquentProductRepository implements ProductRepository {

    private $model;
    private $productCategoryRelation;
    public function __construct(Product $product, ProductCategoryRelation $productCategoryRelation)
    {
        $this->model = $product;
        $this->productCategoryRelation = $productCategoryRelation;
    }

    /**
     * @return mixed
     */
    public function getAllProducts()
    {
        try {
            return $this->model
                ->select('id', 'name', 'sku', 'price', 'sale_price',
                        'is_publish', 'is_feature', 'is_best_seller', 'is_free_ship',
                        'rating', 'created_at', 'updated_at')
                ->orderBy('id', 'asc')
                ->get();
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createProduct($data) {
        try {
            return $this->model->create($data);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function getDetailProduct($productId) {
        try {
            return $this->model->select('*')
                ->where('id', $productId)
                ->first();
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $productId
     * @param $data
     * @return mixed
     */
    public function updateProduct($productId, $data) {
        try {
            return $this->model->where('id',$productId)->update($data);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }
}