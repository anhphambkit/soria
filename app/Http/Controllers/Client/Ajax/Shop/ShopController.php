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
use App\Packages\Admin\Product\Services\GuestInfoServices;
use App\Packages\Admin\Product\Services\ShoppingCartServices;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\SystemGeneral\Services\HelperServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ShopController extends CoreAjaxController {

    protected $helperServices;
    protected $productServices;
    protected $shoppingCartServices;
    protected $guestInfoServices;
    public function __construct(HelperServices $helperServices, ProductServices $productServices,
                                ShoppingCartServices $shoppingCartServices, GuestInfoServices $guestInfoServices)
    {
        $this->helperServices = $helperServices;
        $this->productServices = $productServices;
        $this->shoppingCartServices = $shoppingCartServices;
        $this->guestInfoServices = $guestInfoServices;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function addToCart(Request $request) {
        $products = $request->get('products');
        $isGuest = true;
        if (Auth::check()) {
            $userId = Auth::id();
            $isGuest = false;
        }
        else {
            $userId = Cookie::get('guest_id');
            if (empty($userId)) {
                $ip = $request->ip();
                $userId = $this->guestInfoServices->createGuest($ip);
            }
        }
        $this->shoppingCartServices->addProductsToCartOfUser($products, $userId, $isGuest);
        $basicInfoCart = $this->shoppingCartServices->getBasicInfoCartOfUser($userId, $isGuest);

        if ($isGuest)
            return $this->response($basicInfoCart, Response::STATUS_CUSTOM_ERROR, "UserNotLogin")->withCookie(Cookie::forever('guest_id', $userId));
        else
            return $this->response($basicInfoCart);

    }

    /**
     * @param Request $request
     * @return ShopController|\Illuminate\Http\JsonResponse
     */
    public function viewCartHeader(Request $request) {
        if (Auth::check()) {
            $userId = Auth::id();
            $basicInfoCart = $this->shoppingCartServices->getBasicInfoCartOfUser($userId, false);
            return $this->response($basicInfoCart);
        }
        else {
            $guestId = Cookie::get('guest_id');
            if (empty($guestId)) {
                $ip = $request->ip();
                $guestId = $this->guestInfoServices->createGuest($ip);
            }
            $basicInfoCart = $this->shoppingCartServices->getBasicInfoCartOfUser($guestId);
            return $this->response($basicInfoCart, Response::STATUS_CUSTOM_ERROR, "UserNotLogin")->withCookie(Cookie::forever('guest_id', $guestId));
        }
    }
}
