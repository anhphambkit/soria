<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 13:55
 */

namespace App\Packages\Admin\Repositories;

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
}