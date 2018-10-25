<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/14/18
 * Time: 20:49
 */

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Requests\Admin\CreateProductCategoryRequest;
use App\Packages\Admin\Services\Implement\ImplementProductCategoryServices;
use Illuminate\Http\Request;
use App\Core\Controllers\CoreAjaxController;

class ProductCategoryController extends CoreAjaxController
{
    protected $productCategoryServices;
    public function __construct(ImplementProductCategoryServices $productCategoryServices) {
        $this->productCategoryServices = $productCategoryServices;
    }

    /**
     * Function get all product categories
     */
    public function getAllProductCategory() {
        $result = $this->productCategoryServices->getAllProductCategory();
        $this->response($result);
    }

    /**
     * Function create new product category
     * @param CreateProductCategoryRequest $request
     */
    public function createProductCategory(CreateProductCategoryRequest $request) {
        $result = $this->productCategoryServices->createProductCategory($request->all());
        $this->response($result);
    }

    public function getDetailProductCategory(Request $request) {
        $productCategoryId = $request->get('id');
        $result = $this->productCategoryServices->getDetailProductCategory($productCategoryId);
        $this->response($result);
    }
}