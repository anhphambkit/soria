<?php

namespace Packages\Product\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\Product\Custom\Services\CategoryServices;
use Packages\Product\Custom\Services\ManufacturerServices;
use Packages\Product\Custom\Services\ProductServices;

class WebController extends Controller
{

    /**
     * Instance of EloquentProductServices
     * @var ProductServices
     */
    private $productServices;
    /**
     * Instance of EloquentCategoryServices
     * @var CategoryServices
     */
    private $categoryServices;
    /**
     * Instance of EloquentManufacturerServices
     * @var $manufacturerServices
     */
    private $manufacturerServices;

    public function __construct(ProductServices $productServices, CategoryServices $categoryServices, ManufacturerServices $manufacturerServices)
    {
        $this->productServices = $productServices;
        $this->categoryServices = $categoryServices;
        $this->manufacturerServices = $manufacturerServices;
    }

    /**
     * Index of Product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $products = $this->productServices->all();
        return view('product::index', compact('products'));
    }

    /**
     * New Product (admin page)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newProduct(){
        $cats = $this->categoryServices->all();
        $manufacturers = $this->manufacturerServices->all();
        return view('product::crud', compact('cats', 'manufacturers'));
    }

    /**
     * Edit Product (admin page)
     * @param int $id: Product ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editProduct($id){
        $cats = $this->categoryServices->all();
        $product = $this->productServices->get($id);
        $manufacturers = $this->manufacturerServices->all();
        return view('product::crud', compact('cats', 'product', 'manufacturers'));
    }

    /**
     * Index of Categories Products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryIndex(){
        $cats = $this->categoryServices->all();
        return view('product::categories-index', compact('cats'));
    }

    /**
     * Index of Manufacturer Product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manufacturerIndex(){
        $manufacturers = $this->manufacturerServices->all();
        return view('product::manufacturer.crud', compact('manufacturers'));
    }
}