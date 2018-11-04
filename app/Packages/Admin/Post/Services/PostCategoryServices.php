<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 11:54
 */

namespace App\Packages\Admin\Post\Services;

interface PostCategoryServices {

    /**
     * @param $data
     * @return mixed
     */
    public function createPostCategory($data);

    /**
     * @return mixed
     */
    public function getAllPostCategory();

    /**
     * @param $postCategoryId
     * @return mixed
     */
    public function getDetailPostCategory($postCategoryId);

    /**
     * @param $postCategoryId
     * @param $data
     * @return mixed
     */
    public function updatePostCategory($postCategoryId, $data);
}