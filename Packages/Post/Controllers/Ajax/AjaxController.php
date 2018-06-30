<?php
namespace Packages\Post\Controllers\Ajax;

use Packages\Core\Controllers\CoreAjaxController;
use Packages\Post\Custom\Services\CategoryServices;
use Packages\Post\Custom\Services\PostServices;
use Packages\Post\Requests\CategoryCreateRequest;
use Packages\Post\Requests\CategoryDeleteRequest;
use Packages\Post\Requests\CategoryUpdateRequest;
use Packages\Post\Requests\PostCreateRequest;
use Packages\Post\Requests\PostDeleteRequest;
use Packages\Post\Requests\PostUpdateRequest;

class AjaxController extends CoreAjaxController
{
    /**
     * @var PostServices
     */
    private $postServices;

    /**
     * @var CategoryServices
     */
    private $categoryServices;

    public function __construct(PostServices $postServices, CategoryServices $categoryServices)
    {
        $this->postServices = $postServices;
        $this->categoryServices = $categoryServices;
    }

    /**
     * Create new category
     * @param CategoryCreateRequest $categoryCreateRequest
     * @return string
     */
    public function createCategory(CategoryCreateRequest $categoryCreateRequest){
        return $this->response($this->categoryServices->crud($categoryCreateRequest->all()));
    }

    /**
     * Update category
     * @param CategoryUpdateRequest $categoryUpdateRequest
     * @param int $id
     * @return string
     */
    public function updateCategory(CategoryUpdateRequest $categoryUpdateRequest, $id){
        return $this->response($this->categoryServices->crud($categoryUpdateRequest->all(), $id));
    }

    /**
     * Delete category
     * @param CategoryDeleteRequest $categoryDeleteRequest
     * @return string
     */
    public function deleteCategory(CategoryDeleteRequest $categoryDeleteRequest){
        return $this->response($this->categoryServices->delete($categoryDeleteRequest['id']));
    }

    /**
     * Get category
     * @param $id
     * @return string
     */
    public function getCategory($id){
        return $this->response($this->categoryServices->get($id));
    }

    /**
     * Create new post
     * @param PostCreateRequest $postCreateRequest
     * @return string
     */
    public function createPost(PostCreateRequest $postCreateRequest){
        return $this->response($this->postServices->crud($postCreateRequest->all()));
    }

    /**
     * Update post
     * @param PostUpdateRequest $postUpdateRequest
     * @param int $id
     * @return string
     */
    public function updatePost(PostUpdateRequest $postUpdateRequest, $id){
        return $this->response($this->postServices->crud($postUpdateRequest->all(), $id));
    }

    /**
     * Delete specific post
     * @param PostDeleteRequest $postDeleteRequest
     * @return mixed
     */
    public function deletePost(PostDeleteRequest $postDeleteRequest){
        return $this->response($this->postServices->delete($postDeleteRequest['id']));
    }
}