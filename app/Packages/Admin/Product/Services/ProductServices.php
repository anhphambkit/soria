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
     * @return mixed
     */
    public function getAllProductsByCategory(int $categoryId = null, bool $isHomepage = false);

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
}