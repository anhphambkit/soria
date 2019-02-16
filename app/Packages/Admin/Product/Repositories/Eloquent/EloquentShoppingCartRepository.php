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
use App\Packages\Admin\Product\Entities\GuestShoppingCart;
use App\Packages\Admin\Product\Entities\UserShoppingCart;
use App\Packages\Admin\Product\Entities\ProductCategoryRelation;
use App\Packages\Admin\Product\Repositories\ShoppingCartRepository;
use App\Packages\SystemGeneral\Constants\MediaConfig;
use Illuminate\Support\Facades\DB;

class EloquentShoppingCartRepository implements ShoppingCartRepository {

    private $userShoppingCart;
    private $guestShoppingCart;
    private $productCategoryRelation;
    public function __construct(UserShoppingCart $userShoppingCart, GuestShoppingCart $guestShoppingCart,ProductCategoryRelation $productCategoryRelation)
    {
        $this->userShoppingCart = $userShoppingCart;
        $this->guestShoppingCart = $guestShoppingCart;
        $this->productCategoryRelation = $productCategoryRelation;
    }

    /**
     * @param bool $isGuest
     * @return GuestShoppingCart|UserShoppingCart
     */
    private function setCurrentRepository(bool $isGuest = true) {
        if (!$isGuest)
            return $this->userShoppingCart;

        return $this->guestShoppingCart;
    }

    /**
     * @param int $productId
     * @param int $quantity
     * @param int $userId
     * @param bool $isGuest
     * @param bool $isUpdate
     * @return mixed
     * @throws \Exception
     */
    public function addOrUpdateProductsToCartOfUser(int $productId, int $quantity = 1, int $userId = 0, bool $isGuest = true, bool $isUpdate = true) {
        try {
            $model = $this->setCurrentRepository($isGuest);

            $dataFindOrCreate = ['guest_id' => $userId, 'product_id' => $productId];
            if (!$isGuest)
                $dataFindOrCreate = ['user_id' => $userId, 'product_id' => $productId];

            $productInCart = $model->firstOrNew($dataFindOrCreate);

            if ($isUpdate) // Mode update
                $productInCart->quantity = $quantity;
            else
                $productInCart->quantity = ($productInCart->quantity + $quantity);

            return $productInCart->save();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int|null $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function getBasicInfoCartOfUser(int $userId = null, bool $isGuest = true) {
        try {
            $model = $this->setCurrentRepository($isGuest);

            $whereCondition = [
                [ "{$model->getTable()}.guest_id", '=', $userId ]
            ];
            if (!$isGuest)
                $whereCondition = [
                    [ "{$model->getTable()}.user_id", '=', $userId ]
                ];;

            $query = $model->select('products.id', 'products.name', 'products.slug',
                                            'products.price', 'products.sale_price', "{$model->getTable()}.quantity",
                                            DB::raw('array_to_json(array_remove(array_agg(DISTINCT category.*), null)) as categories,
                                                            array_to_json(array_remove(array_agg(DISTINCT media_tbl.*), null)) as medias')
                                )
                                ->leftJoin(ProductConfig::PRODUCT_TBL . ' as products', "{$model->getTable()}.product_id", '=', 'products.id')
                                ->leftJoin(CategoryProductConfig::CATEGORY_PRODUCT_RELATION_TBL . ' as relation', 'relation.product_id', '=', 'products.id')
                                ->leftJoin(CategoryProductConfig::PRODUCT_CATEGORY_TBL . ' as category', 'category.id', '=', 'relation.cate_id')
                                ->leftJoin(MediaProductConfig::FEATURE_PRODUCT_TBL . ' as feature_product_tbl', 'products.id', '=', 'feature_product_tbl.product_id')
                                ->leftJoin(MediaConfig::MEDIA_TBL . ' as media_tbl', 'media_tbl.id', '=', 'feature_product_tbl.media_id')
                                ->groupBy('products.id', "{$model->getTable()}.quantity")
                                ->where($whereCondition)
                                ->where("{$model->getTable()}.quantity", ">", 0)
                                ->where('products.is_publish', true)
                                ->get();
            return $query;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $userId
     * @param bool $isGuest
     * @return mixed
     * @throws \Exception
     */
    public function getTotalItemsInCart(int $userId, bool $isGuest = true) {
        try {
            $model = $this->setCurrentRepository($isGuest);

            $whereCondition = [
                [ "{$model->getTable()}.guest_id", '=', $userId ]
            ];
            if (!$isGuest)
                $whereCondition = [
                    [ "{$model->getTable()}.user_id", '=', $userId ]
                ];;

            $query = $model->select("{$model->getTable()}.quantity")
                            ->leftJoin(ProductConfig::PRODUCT_TBL . ' as products', "{$model->getTable()}.product_id", '=', 'products.id')
                            ->where($whereCondition)
                            ->where('products.is_publish', true)
                            ->get();
            return $query->sum('quantity');
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}