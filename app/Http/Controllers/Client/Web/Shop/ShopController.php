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
use App\Packages\Admin\Product\Services\ShoppingCartServices;
use App\Packages\SystemGeneral\Services\HelperServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class ShopController extends Controller {

    protected $helperServices;
    protected $productServices;
    protected $shoppingCartServices;
    public function __construct(HelperServices $helperServices, ProductServices $productServices, ShoppingCartServices $shoppingCartServices)
    {
        parent::__construct();
        $this->helperServices = $helperServices;
        $this->productServices = $productServices;
        $this->shoppingCartServices = $shoppingCartServices;
        $isGuest = true;
        if (Auth::check()) {
            $userId = Auth::id();
            $isGuest = false;
        }
        else
            $userId = Cookie::get('guest_id');

        if (!empty($userId) && $userId > 0)
            $totalItems = $this->shoppingCartServices->getTotalItemsInCart($userId, $isGuest);
        else
            $totalItems = 0;
        View::share("totalItems", $totalItems);
    }

    /**
     * List Posts.
     * @return
     */
    public function index() {
        $productGroups = $this->productServices->getAllProductsByCategory(null, true);
        $bestSellerProducts = $this->productServices->getAllProductsByCategory(null, true, true);
        return view(config('setting.theme.shop') . '.pages.shop', compact('productGroups', 'bestSellerProducts'));
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
        return view(config('setting.theme.shop') . '.pages.product-detail', compact('product', 'relatedProducts'));
    }
}