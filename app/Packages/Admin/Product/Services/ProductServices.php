<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:32
 */

namespace App\Packages\Admin\Product\Services;

interface ProductServices {

    /**
     * @param $data
     * @return mixed
     */
    public function createProduct($data);

    /**
     * @return mixed
     */
    public function getAllProducts();

    /**
     * @param int|null $categoryId
     * @param bool $isHomepage
     * @param bool $isBestSeller
     * @return mixed
     */
    public function getAllProductsByCategory(int $categoryId = null, bool $isHomepage = false, bool $isBestSeller = false);

    /**
     * @param int $productId
     * @param bool $isPublish
     * @return mixed
     */
    public function getDetailProduct(int $productId, bool $isPublish = true);

    /**
     * @param $categories
     * @return mixed
     */
    public function getRelatedProductByCategories($categories);

    /**
     * @param $productId
     * @param $data
     * @return mixed
     */
    public function updateProduct($productId, $data);

    /**
     * @param int $productId
     * @return mixed
     */
    public function checkProductPublish(int $productId);

    /**
     * @param array $productIds
     * @param array $quantityProducts
     * @return mixed
     */
    public function getProductsInCartFromProductIds(array $productIds, array $quantityProducts = []);

    /**
     * @param int $categoryId
     * @return mixed
     */
    public function getAllProductsOfCategoryById(int $categoryId);
}