<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/22/18
 * Time: 10:40
 */

namespace App\Http\Controllers\Admin\Ajax\Post;

use App\Http\Requests\Admin\Post\CreatePostRequest;
use App\Packages\Admin\Post\Services\PostServices;
use Illuminate\Http\Request;
use App\Core\Controllers\CoreAjaxController;

class PostController extends CoreAjaxController
{
    protected $postServices;
    public function __construct(PostServices $postServices) {
        $this->postServices = $postServices;
    }

    /**
     * Function get all posts
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllPosts() {
        $result = $this->postServices->getAllPosts();
        return $this->response($result);
    }

    /**
     * Function create new post
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPost(CreatePostRequest $request) {
        $result = $this->postServices->createPost($request->all());
        return $this->response($result);
    }

    /**
     * Function get detail post
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetailPost(Request $request) {
        $postId = $request->get('id');
        $result = $this->postServices->getDetailPostForAdminUpdate($postId);
        return $this->response($result);
    }

    /**
     * Function update post
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePost(CreatePostRequest $request) {
        $data = $request->all();
        $postId = $data['id'];
        unset($data['id']);
        $result = $this->postServices->updatePost($postId, $data);
        return $this->response($result);
    }
}