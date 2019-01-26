<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:35
 */

namespace App\Packages\Admin\Product\Repositories;

interface ProductRepository {
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
     * @param $data
     * @return mixed
     */
    public function createProduct($data);

    /**
     * @param $productId
     * @return mixed
     */
    public function getDetailProduct($productId);

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
     * @return mixed
     */
    public function getProductsInCartFromProductIds(array $productIds);
}