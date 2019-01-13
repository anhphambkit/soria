<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/12/19
 * Time: 11:20
 */

namespace App\Http\Controllers\Client\Web\Shop;


use App\Http\Controllers\SystemGeneral\Web\Controller;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\SystemGeneral\Services\HelperServices;

class ShopController extends Controller {

    protected $helperServices;
    protected $productServices;
    public function __construct(HelperServices $helperServices, ProductServices $productServices)
    {
        parent::__construct();
        $this->helperServices = $helperServices;
        $this->productServices = $productServices;
    }

    /**
     * List Posts.
     *
     * @return
     */
    public function index() {
        $products = $this->productServices->getAllProducts();
        return view(config('setting.theme.shop') . '.pages.shop', compact('products'));
    }

    /**
     * @param $domain
     * @param $url
     * @return mixed
     */
    public function viewDetailProduct($domain, $url) {
        $productId = $this->helperServices->getIdFromUrl($url);
        if (!$productId) {
            return abort(404);
        }

        $product = $this->productServices->getDetailProduct($productId);
//        dd($product);
        return view(config('setting.theme.shop') . '.pages.products.single-product', compact('product'));
    }
}