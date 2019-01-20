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
     * @return
     */
    public function index() {
        $products = $this->productServices->getAllProductsByCategory(null, true);
//        dd($products);
        $result = [];
        $productGroups = $products->mapWithKeys(function ($item) use (&$result) {
            foreach ($item['categories'] as $category) {
                if (!isset($result[$category['name']]))
                    $result[$category['name']] = [];
                array_push($result[$category['name']], $item);
            }
            return $result;
        });
        return view(config('setting.theme.shop') . '.pages.shop', compact('productGroups'));
    }

    /**
     * @param $domain
     * @param $url
     * @return mixed
     */
    public function viewDetailProduct($domain, $urlProduct) {
        $productId = $this->helperServices->getIdFromUrl($urlProduct);
        if (!$productId) {
            return abort(404);
        }

        $product = $this->productServices->getDetailProduct($productId);
        $relatedProducts = $this->productServices->getRelatedProductByCategories($product->categories);
//        dd($relatedProducts);
        return view(config('setting.theme.shop') . '.pages.product-detail', compact('product', 'relatedProducts'));
    }
}