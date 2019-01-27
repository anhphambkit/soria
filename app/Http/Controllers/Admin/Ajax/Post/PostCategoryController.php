<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/14/18
 * Time: 20:49
 */

namespace App\Http\Controllers\Admin\Ajax\Post;

use App\Http\Requests\Admin\Post\CreatePostCategoryRequest;
use App\Packages\Admin\Post\Services\PostCategoryServices;
use Illuminate\Http\Request;
use App\Core\Controllers\CoreAjaxController;

class PostCategoryController extends CoreAjaxController
{
    protected $postCategoryServices;
    public function __construct(PostCategoryServices $postCategoryServices) {
        $this->postCategoryServices = $postCategoryServices;
    }

    /**
     * Function get all post categories
     */
    public function getAllPostCategory() {
        $result = $this->postCategoryServices->getAllPostCategory();
        return $this->response($result);
    }

    /**
     * Function create new post category
     * @param CreatePostCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPostCategory(CreatePostCategoryRequest $request) {
        $result = $this->postCategoryServices->createPostCategory($request->all());
        return $this->response($result);
    }

    /**
     * Function get detail post category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetailPostCategory(Request $request) {
        $postCategoryId = $request->get('id');
        $result = $this->postCategoryServices->getDetailPostCategory($postCategoryId);
        return $this->response($result);
    }

    /**
     * Function update post category
     * @param CreatePostCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePostCategory(CreatePostCategoryRequest $request) {
        $data = $request->all();
        $postCategoryId = $data['id'];
        unset($data['id']);
        $result = $this->postCategoryServices->updatePostCategory($postCategoryId, $data);
        return $this->response($result);
    }
}