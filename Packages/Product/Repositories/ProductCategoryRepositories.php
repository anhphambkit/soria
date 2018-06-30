<?php
namespace Packages\Product\Repositories;

interface ProductCategoryRepositories
{
    /**
     * @param array $categories : List category ID want to attach
     * @param int $productId : Product ID
     * @return boolean
     */
    public function attachCategoriesToProduct($categories, $productId);

    /**
     * Remove categories from product
     * @param int $productId : Product ID
     * @return boolean
     */
    public function detachCategoriesToProduct($productId);


    /**
     * Remove all relation Product to Category, by CatID
     * @param int $catId : Cat ID
     * @return boolean
     */
    public function detachProductsByCategory($catId);
}