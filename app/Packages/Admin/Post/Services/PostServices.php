<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 11:54
 */

namespace App\Packages\Admin\Post\Services;

interface PostServices {

    /**
     * @param $data
     * @return mixed
     */
    public function createPost($data);

    /**
     * @return mixed
     */
    public function getAllPosts();

    /**
     * @param $postId
     * @return mixed
     */
    public function getDetailPost($postId);

    /**
     * @param $postId
     * @param $data
     * @return mixed
     */
    public function updatePost($postId, $data);

    /**
     * @param int|null $categoryId | if categoryId null, get all posts
     * @param boolean $isHomepage | default false
     * @return mixed
     */
    public function getAllPostsByCategory(int $categoryId = null, bool $isHomepage = false);
}