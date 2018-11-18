<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:35
 */

namespace App\Packages\Admin\Product\Repositories\Eloquent;

use App\Packages\Admin\Product\Constants\CategoryProductConfig;
use App\Packages\Admin\Product\Constants\MediaProductConfig;
use App\Packages\Admin\Product\Entities\Product;
use App\Packages\Admin\Product\Entities\ProductCategoryRelation;
use App\Packages\Admin\Product\Repositories\ProductRepository;
use App\Packages\SystemGeneral\Constants\MediaConfig;
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
                ->select(DB::raw('array_to_json(array_remove(array_agg(DISTINCT category.name), null)) as category_name, products.*'))
                ->leftJoin(CategoryProductConfig::CATEGORY_PRODUCT_RELATION_TBL . ' as relation', 'relation.product_id', '=', 'products.id')
                ->leftJoin(CategoryProductConfig::PRODUCT_CATEGORY_TBL . ' as category', 'category.id', '=', 'relation.cate_id')
                ->groupBy('products.id')
                ->orderBy('id', 'desc')
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
            return $this->model->select(
                DB::raw('products.*,
                                array_to_json(array_remove(array_agg(DISTINCT category.id), null)) as category_id,
                                array_to_json(array_remove(array_agg(DISTINCT media_feature_tbl.*), null)) as feature_images,
                                array_to_json(array_remove(array_agg(DISTINCT media_gallery_tbl.*), null)) as gallery_images')
                )
                ->leftJoin(CategoryProductConfig::CATEGORY_PRODUCT_RELATION_TBL . ' as relation', 'relation.product_id', '=', 'products.id')
                ->leftJoin(CategoryProductConfig::PRODUCT_CATEGORY_TBL . ' as category', 'category.id', '=', 'relation.cate_id')
                ->leftJoin(MediaProductConfig::FEATURE_PRODUCT_TBL . ' as feature_images_tbl', 'products.id', '=', 'feature_images_tbl.product_id')
                ->leftJoin(MediaConfig::MEDIA_TBL . ' as media_feature_tbl', 'media_feature_tbl.id', '=', 'feature_images_tbl.media_id')
                ->leftJoin(MediaProductConfig::GALLERY_PRODUCT_TBL . ' as gallery_images_tbl', 'products.id', '=', 'gallery_images_tbl.product_id')
                ->leftJoin(MediaConfig::MEDIA_TBL . ' as media_gallery_tbl', 'media_gallery_tbl.id', '=', 'gallery_images_tbl.media_id')
                ->groupBy('products.id')
                ->where('products.id', $productId)
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