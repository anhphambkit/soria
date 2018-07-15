<?php

namespace App\Http\Controllers\Admin\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //if you have a constructor in other controllers you need call constructor of parent controller (i.e. BaseController) like so:

    public function __construct(){
        parent::__construct();
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
        return view('backend.ModernAdmin.pages.dashboard');
    }

    /**
     * New Category Product.
     *
     * @return
     */
    public function newCategoryProduct() {
        return view('backend.ModernAdmin.pages.products.newCategoryProduct');
    }
}
