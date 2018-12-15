<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 13:55
 */

namespace App\Packages\Admin\Product\Repositories;

interface ProductCategoryRepository {
    /**
     * @return mixed
     */
    public function getAllProductCategory();

    /**
     * @param $data
     * @return mixed
     */
    public function createProductCategory($data);

    /**
     * @param $productCategoryId
     * @return mixed
     */
    public function getDetailProductCategory($productCategoryId);

    /**
     * @param $productCategoryId
     * @param $data
     * @return mixed
     */
    public function updateProductCategory($productCategoryId, $data);

    /**
     * Delete Product Category
     * @param $productCategoryId
     * @return mixed
     */
    public function deleteProductCategory($productCategoryId);
}