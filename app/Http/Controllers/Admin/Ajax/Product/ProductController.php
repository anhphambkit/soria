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
     */
    public function getAllProducts() {
        $result = $this->productServices->getAllProducts();
        $this->response($result);
    }

    /**
     * Function create new product
     * @param CreateProductRequest $request
     */
    public function createProduct(CreateProductRequest $request) {
        $result = $this->productServices->createProduct($request->all());
        $this->response($result);
    }

    /**
     * @param Request $request
     * Function get detail product
     */
    public function getDetailProduct(Request $request) {
        $productId = $request->get('id');
        $result = $this->productServices->getDetailProduct($productId);
        $this->response($result);
    }

    /**
     * @param CreateProductRequest $request
     * Function update product
     */
    public function updateProduct(CreateProductRequest $request) {
        $data = $request->all();
        $productId = $data['id'];
        unset($data['id']);
        $result = $this->productServices->updateProduct($productId, $data);
        $this->response($result);
    }
}