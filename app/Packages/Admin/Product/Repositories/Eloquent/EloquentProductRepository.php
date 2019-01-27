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
     * @throws \Exception
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
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int|null $categoryId
     * @param bool $isHomepage
     * @param bool $isBestSeller
     * @return mixed
     * @throws \Exception
     */
    public function getAllProductsByCategory(int $categoryId = null, bool $isHomepage = false, bool $isBestSeller = false)
    {
        try {
            $query = $this->model
                ->select('products.id', 'products.name', 'products.slug', 'products.desc', 'products.rating',
                    'products.price', 'products.sale_price', 'products.created_at', 'products.updated_at',
                    'products.meta_keywords', 'products.meta_title', 'products.meta_description',
                    DB::raw('array_to_json(array_remove(array_agg(DISTINCT category.*), null)) as categories,
                                    array_to_json(array_remove(array_agg(DISTINCT media_tbl.*), null)) as medias')
                )
                ->leftJoin(CategoryProductConfig::CATEGORY_PRODUCT_RELATION_TBL . ' as relation', 'relation.product_id', '=', 'products.id')
                ->leftJoin(CategoryProductConfig::PRODUCT_CATEGORY_TBL . ' as category', 'category.id', '=', 'relation.cate_id')
                ->leftJoin(MediaProductConfig::FEATURE_PRODUCT_TBL . ' as feature_product_tbl', 'products.id', '=', 'feature_product_tbl.product_id')
                ->leftJoin(MediaConfig::MEDIA_TBL . ' as media_tbl', 'media_tbl.id', '=', 'feature_product_tbl.media_id')
                ->groupBy('products.id', 'category.order')
                ->where('products.is_publish', '=', true);

            if ($isHomepage)
                $query = $query->where('products.is_feature', '=', true);

            if ($categoryId)
                $query = $query->where('relation.cate_id', '=', $categoryId);

            if ($isBestSeller)
                $query = $query->where('products.is_best_seller', '=', true);

            return $query->orderBy('category.order', 'asc')->orderBy('products.order', 'asc')->get();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function createProduct($data) {
        try {
            return $this->model->create($data);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $productId
     * @param bool $isPublish
     * @return mixed
     * @throws \Exception
     */
    public function getDetailProduct(int $productId, bool $isPublish = true) {
        try {
            $query = $this->model->select(
                DB::raw('products.*,
                                array_to_json(array_remove(array_agg(DISTINCT category.*), null)) as categories,
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
                ->where('products.id', $productId);

            if ($isPublish)
                $query = $query->where('products.is_publish', $isPublish);

            return $query->first();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param $productId
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function updateProduct($productId, $data) {
        try {
            return $this->model->where('id',$productId)->update($data);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $productId
     * @return mixed
     * @throws \Exception
     */
    public function checkProductPublish(int $productId) {
        try {
            return $this->model->where('id', $productId)->exists();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param array $productIds
     * @return mixed
     * @throws \Exception
     */
    public function getProductsInCartFromProductIds(array $productIds) {
        try {
            $query = $this->model->select('products.id', 'products.name', 'products.slug',
                                        'products.price', 'products.sale_price',
                                        DB::raw('array_to_json(array_remove(array_agg(DISTINCT category.*), null)) as categories,
                                                                                    array_to_json(array_remove(array_agg(DISTINCT media_tbl.*), null)) as medias')
                                    )
                                    ->leftJoin(CategoryProductConfig::CATEGORY_PRODUCT_RELATION_TBL . ' as relation', 'relation.product_id', '=', 'products.id')
                                    ->leftJoin(CategoryProductConfig::PRODUCT_CATEGORY_TBL . ' as category', 'category.id', '=', 'relation.cate_id')
                                    ->leftJoin(MediaProductConfig::FEATURE_PRODUCT_TBL . ' as feature_product_tbl', 'products.id', '=', 'feature_product_tbl.product_id')
                                    ->leftJoin(MediaConfig::MEDIA_TBL . ' as media_tbl', 'media_tbl.id', '=', 'feature_product_tbl.media_id')
                                    ->groupBy('products.id')
                                    ->where('products.is_publish', true)
                                    ->whereIn('products.id', $productIds)
                                    ->get();
            return $query;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}