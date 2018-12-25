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
     */
    public function getAllPosts() {
        $result = $this->postServices->getAllPosts();
        $this->response($result);
    }

    /**
     * Function create new post
     * @param CreatePostRequest $request
     */
    public function createPost(CreatePostRequest $request) {
        $result = $this->postServices->createPost($request->all());
        $this->response($result);
    }

    /**
     * @param Request $request
     * Function get detail post
     */
    public function getDetailPost(Request $request) {
        $postId = $request->get('id');
        $result = $this->postServices->getDetailPost($postId);
        $this->response($result);
    }

    /**
     * @param Request $request
     * Function update post
     */
    public function updatePost(Request $request) {
        $data = $request->all();
        $postId = $data['id'];
        unset($data['id']);
        $result = $this->postServices->updatePost($postId, $data);
        $this->response($result);
    }
}