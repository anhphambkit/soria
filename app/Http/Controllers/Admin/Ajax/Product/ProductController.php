<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:30
 */

namespace App\Http\Controllers\Admin\Ajax\Product;

use App\Http\Requests\Admin\Product\CreateProductRequest;
use App\Packages\Admin\Product\Services\ProductServices;
use Illuminate\Http\Request;
use App\Core\Controllers\CoreAjaxController;

class ProductController extends CoreAjaxController
{
    protected $productServices;
    public function __construct(ProductServices $productServices) {
        $this->productServices = $productServices;
    }

    /**
     * Function get all products
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllProducts() {
        $result = $this->productServices->getAllProducts();
        return $this->response($result);
    }

    /**
     * Function create new product
     * @param CreateProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProduct(CreateProductRequest $request) {
        $result = $this->productServices->createProduct($request->all());
        return $this->response($result);
    }

    /**
     * Function get detail product
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetailProduct(Request $request) {
        $productId = $request->get('id');
        $result = $this->productServices->getDetailProduct($productId, false);
        return $this->response($result);
    }

    /**
     * Function update product
     * @param CreateProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProduct(CreateProductRequest $request) {
        $data = $request->all();
        $productId = $data['id'];
        unset($data['id']);
        $result = $this->productServices->updateProduct($productId, $data);
        return $this->response($result);
    }
}