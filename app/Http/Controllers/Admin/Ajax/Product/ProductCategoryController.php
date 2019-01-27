<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/14/18
 * Time: 20:49
 */

namespace App\Http\Controllers\Admin\Ajax\Product;

use App\Http\Requests\Admin\Product\CreateProductCategoryRequest;
use App\Packages\Admin\Product\Services\ProductCategoryServices;
use Illuminate\Http\Request;
use App\Core\Controllers\CoreAjaxController;

class ProductCategoryController extends CoreAjaxController
{
    protected $productCategoryServices;
    public function __construct(ProductCategoryServices $productCategoryServices) {
        $this->productCategoryServices = $productCategoryServices;
    }

    /**
     * Function get all product categories
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllProductCategory() {
        $result = $this->productCategoryServices->getAllProductCategory();
        return $this->response($result);
    }

    /**
     * Function create new product category
     * @param CreateProductCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProductCategory(CreateProductCategoryRequest $request) {
        $result = $this->productCategoryServices->createProductCategory($request->all());
        return $this->response($result);
    }

    /**
     * Function get detail product category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetailProductCategory(Request $request) {
        $productCategoryId = $request->get('id');
        $result = $this->productCategoryServices->getDetailProductCategory($productCategoryId);
        return $this->response($result);
    }

    /**
     * Update Product Category
     * @param CreateProductCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProductCategory(CreateProductCategoryRequest $request) {
        $data = $request->all();
        $productCategoryId = $data['id'];
        unset($data['id']);
        $result = $this->productCategoryServices->updateProductCategory($productCategoryId, $data);
        return $this->response($result);
    }

    /**
     * Delete product category
     * @param Request $request
     * @return mixed
     */
    public function deleteProductCategory(Request $request) {
        $data = $request->all();
        $productCategoryId = $data['id'];
        return $this->productCategoryServices->deleteProductCategory($productCategoryId);
    }
}