<?php
namespace Packages\Product\Controllers\Ajax;

use Packages\Core\Controllers\CoreAjaxController;
use Packages\Product\Custom\Services\CategoryServices;
use Packages\Product\Custom\Services\ProductServices;
use Packages\Product\Requests\CategoryCreateRequest;
use Packages\Product\Requests\CategoryDeleteRequest;
use Packages\Product\Requests\CategoryUpdateRequest;
use Packages\Product\Requests\ProductCreateRequest;
use Packages\Product\Requests\ProductDeleteRequest;
use Packages\Product\Requests\ProductUpdateRequest;

class AjaxController extends CoreAjaxController
{
    /**
     * @var ProductServices
     */
    private $productServices;

    /**
     * @var CategoryServices
     */
    private $categoryServices;

    public function __construct(ProductServices $productServices, CategoryServices $categoryServices)
    {
        $this->productServices = $productServices;
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
     * Create new product
     * @param ProductCreateRequest $productCreateRequest
     * @return string
     */
    public function createProduct(ProductCreateRequest $productCreateRequest){
        return $this->response($this->productServices->crud($productCreateRequest->all()));
    }

    /**
     * Update product
     * @param ProductUpdateRequest $productUpdateRequest
     * @param int $id
     * @return string
     */
    public function updateProduct(ProductUpdateRequest $productUpdateRequest, $id){
        return $this->response($this->productServices->crud($productUpdateRequest->all(), $id));
    }

    /**
     * Delete specific product
     * @param ProductDeleteRequest $productDeleteRequest
     * @return mixed
     */
    public function deleteProduct(ProductDeleteRequest $productDeleteRequest){
        return $this->response($this->productServices->delete($productDeleteRequest['id']));
    }
}