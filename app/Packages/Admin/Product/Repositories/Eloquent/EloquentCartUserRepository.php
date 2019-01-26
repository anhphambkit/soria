<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 12:30
 */

namespace App\Packages\Admin\Product\Repositories\Eloquent;

use App\Packages\Admin\Product\Entities\CartUser;
use App\Packages\Admin\Product\Entities\ProductCategoryRelation;
use App\Packages\Admin\Product\Repositories\CartUserRepository;
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
            $productInCart->save();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}