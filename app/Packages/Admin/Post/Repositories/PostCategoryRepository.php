<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 13:55
 */

namespace App\Packages\Admin\Post\Repositories;

interface PostCategoryRepository {
    /**
     * @return mixed
     */
    public function getAllPostCategory();

    /**
     * @param $data
     * @return mixed
     */
    public function createPostCategory($data);

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