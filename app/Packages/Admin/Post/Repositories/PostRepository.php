<?php
/**
 * Created by PhpStorm.
 * User: BiWin
 * Date: 19/12/2018
 * Time: 11:53 PM
 */

namespace App\Packages\Admin\Post\Repositories;

interface PostRepository {
    /**
     * @return mixed
     */
    public function getAllPosts();

    /**
     * @param $data
     * @return mixed
     */
    public function createPost($data);

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

    /**
     * @param $dataGet
     * @param string $attributeGet
     * @return mixed
     */
    public function getNextPrevPost($dataGet, $attributeGet = "created_at");
}