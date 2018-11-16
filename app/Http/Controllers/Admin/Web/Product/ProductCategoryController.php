<?php

namespace App\Http\Controllers\Admin\Web\Product;

use App\Packages\Admin\Product\Services\ProductCategoryServices;
use Illuminate\Http\Request;
use App\Http\Controllers\SystemGeneral\Web\Controller;

class ProductCategoryController extends Controller
{
    //if you have a constructor in other controllers you need call constructor of parent controller (i.e. BaseController) like so:
    protected $productCategoryServices;
    public function __construct(ProductCategoryServices $productCategoryServices) {
        parent::__construct();
        $this->productCategoryServices = $productCategoryServices;
    }

    /**
     * List Product Categories.
     *
     * @return
     */
    public function indexCategoryProduct() {
        $categories = $this->productCategoryServices->getAllProductCategory();
        return view('backend.modern-admin.pages.products.manage-category-products', compact('categories'));
    }

    /**
     * New Category Product.
     *
     * @return
     */
    public function newCategoryProduct() {
        $categories = $this->productCategoryServices->getAllProductCategory();
        return view('backend.modern-admin.pages.products.new-category-product', compact('categories'));
    }
}