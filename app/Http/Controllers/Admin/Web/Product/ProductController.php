<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:30
 */
namespace App\Http\Controllers\Admin\Web\Product;

use App\Packages\Admin\Product\Services\ProductServices;
use App\Http\Controllers\SystemGeneral\Web\Controller;

class ProductController extends Controller
{
    //if you have a constructor in other controllers you need call constructor of parent controller (i.e. BaseController) like so:
    protected $productServices;
    public function __construct(ProductServices $productServices) {
        parent::__construct();
        $this->productServices = $productServices;
    }

    /**
     * List Products.
     *
     * @return
     */
    public function indexProduct() {
        return view('backend.modern-admin.pages.products.manage-product');
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
}
