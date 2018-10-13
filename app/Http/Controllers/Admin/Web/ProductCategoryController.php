<?php

namespace App\Http\Controllers\Admin\Web;

use App\Packages\Admin\Services\Implement\ImplementProductCategoryServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    //if you have a constructor in other controllers you need call constructor of parent controller (i.e. BaseController) like so:
    protected $productCategoryServices;
    public function __construct(ImplementProductCategoryServices $productCategoryServices) {
        parent::__construct();
        $this->productCategoryServices = $productCategoryServices;
    }

    /**
     * List Products.
     *
     * @return
     */
    public function indexProduct() {

    }

    /**
     * New Product.
     *
     * @return
     */
    public function newProduct() {

    }

    /**
     * Edit Product.
     *
     * @return
     */
    public function editProduct() {

    }

    /**
     * List Product Categories.
     *
     * @return
     */
    public function indexCategoryProduct() {
        return view('backend.modern-admin.pages.dashboard');
    }

    /**
     * New Category Product.
     *
     * @return
     */
    public function newCategoryProduct() {
        $categories = $this->productCategoryServices->getAllProductCategory();
        return view('backend.modern-admin.pages.products.newCategoryProduct', compact('categories'));
    }
}
