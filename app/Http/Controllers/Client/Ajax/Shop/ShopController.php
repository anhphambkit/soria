<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 10:06
 */

namespace App\Http\Controllers\Client\Ajax\Shop;


use App\Core\Controllers\CoreAjaxController;
use App\Core\Response\Response;
use App\Packages\Admin\Product\Services\CartUserServices;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\SystemGeneral\Services\HelperServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends CoreAjaxController {

    protected $helperServices;
    protected $productServices;
    protected $cartUserServices;
    public function __construct(HelperServices $helperServices, ProductServices $productServices, CartUserServices $cartUserServices)
    {
        $this->helperServices = $helperServices;
        $this->productServices = $productServices;
        $this->cartUserServices = $cartUserServices;
    }

    /**
     * @param Request $request
     */
    public function addToCart(Request $request) {
        $products = $request->get('products');
        if (Auth::check()) {
            $userId = Auth::id();
            $this->cartUserServices->addProductsToCartOfUser($products, $userId);
            $basicInfoCart = $this->cartUserServices->getBasicInfoCartOfUser($userId);
            $this->response($basicInfoCart);
            return;
        }
        else {
            $cart = $request->get('cart');
            $basicInfoCart = $this->cartUserServices->getBasicInfoCartFromClient($products, $cart);
            $this->response($basicInfoCart, Response::STATUS_CUSTOM_ERROR, "UserNotLogin");
            return;
        }
    }
}
