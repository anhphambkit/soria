<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 11:54
 */

namespace App\Packages\Admin\Product\Services;

interface ProductCategoryServices {

    /**
     * @param $data
     * @return mixed
     */
    public function createProductCategory($data);

    /**
     * @return mixed
     */
    public function getAllProductCategory();

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
}