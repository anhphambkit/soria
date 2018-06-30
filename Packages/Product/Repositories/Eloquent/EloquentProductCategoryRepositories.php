<?php
namespace Packages\Product\Repositories\Eloquent;
use Illuminate\Support\Facades\DB;
use Packages\Product\Entities\Product;
use Packages\Product\Repositories\ProductCategoryRepositories;

class EloquentProductCategoryRepositories implements ProductCategoryRepositories
{
    private $table = 'product_category_relation';

    /**
     * @param array $categories : List category ID want to attach
     * @param int $productId : Product ID
     * @return boolean
     */
    public function attachCategoriesToProduct($categories, $productId)
    {
        $this->detachCategoriesToProduct($productId);
        // Add categories
        foreach($categories as $catId){
            DB::table($this->table)->insert([
                'product_id'    => $productId,
                'cat_id'        => $catId,
            ]);
        }

        return true;
    }

    /**
     * @param int $productId : Product ID
     * @return boolean
     */
    public function detachCategoriesToProduct($productId)
    {
        // Remove categories available before
        return DB::table($this->table)->where('product_id', $productId)->delete();
    }

    /**
     * Remove all relation Product to Category, by CatID
     * @param int $catId : Cat ID
     * @return boolean
     */
    public function detachProductsByCategory($catId)
    {
        // Remove categories available before
        return DB::table($this->table)->where('cat_id', $catId)->delete();
    }
}