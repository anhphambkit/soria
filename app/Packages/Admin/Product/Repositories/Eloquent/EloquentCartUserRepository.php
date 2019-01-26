<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 12:30
 */

namespace App\Packages\Admin\Product\Repositories\Eloquent;

use App\Packages\Admin\Product\Constants\CategoryProductConfig;
use App\Packages\Admin\Product\Constants\MediaProductConfig;
use App\Packages\Admin\Product\Constants\ProductConfig;
use App\Packages\Admin\Product\Entities\CartUser;
use App\Packages\Admin\Product\Entities\ProductCategoryRelation;
use App\Packages\Admin\Product\Repositories\CartUserRepository;
use App\Packages\SystemGeneral\Constants\MediaConfig;
use Illuminate\Support\Facades\DB;

class EloquentCartUserRepository implements CartUserRepository {

    private $model;
    private $productCategoryRelation;
    public function __construct(CartUser $cartUser, ProductCategoryRelation $productCategoryRelation)
    {
        $this->model = $cartUser;
        $this->productCategoryRelation = $productCategoryRelation;
    }

    /**
     * @param int $productId
     * @param int $userId
     * @param int $quantity
     * @return mixed|void
     * @throws \Exception
     */
    public function addToCartOfUser(int $productId, int $quantity = 1, int $userId = 0) {
        try {
            $productInCart = $this->model->firstOrNew(['user_id' => $userId, 'product_id' => $productId]);
            $productInCart->quantity = ($productInCart->quantity + $quantity);
            return $productInCart->save();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $userId
     * @return mixed
     * @throws \Exception
     */
    public function getBasicInfoCartOfUser(int $userId) {
        try {
            $query = $this->model->select('products.id', 'products.name', 'products.slug',
                                            'products.price', 'products.sale_price', 'cart_user.quantity',
                                            DB::raw('array_to_json(array_remove(array_agg(DISTINCT category.*), null)) as categories,
                                                            array_to_json(array_remove(array_agg(DISTINCT media_tbl.*), null)) as medias')
                                )
                                ->leftJoin(ProductConfig::PRODUCT_TBL . ' as products', 'cart_user.product_id', '=', 'products.id')
                                ->leftJoin(CategoryProductConfig::CATEGORY_PRODUCT_RELATION_TBL . ' as relation', 'relation.product_id', '=', 'products.id')
                                ->leftJoin(CategoryProductConfig::PRODUCT_CATEGORY_TBL . ' as category', 'category.id', '=', 'relation.cate_id')
                                ->leftJoin(MediaProductConfig::FEATURE_PRODUCT_TBL . ' as feature_product_tbl', 'products.id', '=', 'feature_product_tbl.product_id')
                                ->leftJoin(MediaConfig::MEDIA_TBL . ' as media_tbl', 'media_tbl.id', '=', 'feature_product_tbl.media_id')
                                ->groupBy('products.id', 'cart_user.quantity')
                                ->where('cart_user.user_id', $userId)
                                ->where('products.is_publish', true)
                                ->get();
            return $query;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}