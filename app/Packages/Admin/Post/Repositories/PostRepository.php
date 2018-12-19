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
}