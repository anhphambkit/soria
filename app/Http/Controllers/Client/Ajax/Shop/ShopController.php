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
    protected $userId;
    protected $isGuest;
    public function __construct(HelperServices $helperServices, ProductServices $productServices,
                                ShoppingCartServices $shoppingCartServices, GuestInfoServices $guestInfoServices)
    {
        $this->helperServices = $helperServices;
        $this->productServices = $productServices;
        $this->shoppingCartServices = $shoppingCartServices;
        $this->guestInfoServices = $guestInfoServices;
        $this->isGuest = true;
        if (Auth::check()) {
            $this->userId = Auth::id();
            $this->isGuest = false;
        }
        else {
            $this->userId = Cookie::get('guest_id');
        }
    }

    /**
     * @param Request $request
     * @param int|null $userId
     * @return int|mixed
     */
    public function checkUserId(Request $request, int $userId = null) {
        if (empty($userId)) {
            $ip = $request->ip();
            $userId = $this->guestInfoServices->createGuest($ip);
        }
        return $userId;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function addOrUpdateProductsToCartOfUser(Request $request) {
        $isUpdate = $request->get('is_update_product');
        $this->userId = $this->checkUserId($request, $this->userId);

        $products = $request->get('products');
        $this->shoppingCartServices->addOrUpdateProductsToCartOfUser($products, $this->userId, $this->isGuest, $isUpdate);
        $basicInfoCart = $this->shoppingCartServices->getBasicInfoCartOfUser($this->userId, $this->isGuest);
        if ($this->isGuest)
            return $this->response($basicInfoCart, Response::STATUS_CUSTOM_ERROR, "UserNotLogin")->withCookie(Cookie::forever('guest_id', $this->userId));
        else
            return $this->response($basicInfoCart);

    }

    /**
     * @param Request $request
     * @return ShopController|\Illuminate\Http\JsonResponse
     */
    public function viewCartHeader(Request $request) {
        $basicInfoCart = $this->shoppingCartServices->getBasicInfoCartOfUser($this->userId, $this->isGuest);
        if ($this->isGuest)
            return $this->response($basicInfoCart, Response::STATUS_CUSTOM_ERROR, "UserNotLogin");
        else
            return $this->response($basicInfoCart);
    }

    public function deleteProductInCart(Request $request) {
        $productId = $request->get('product_id');
        $this->userId = $this->checkUserId($request, $this->userId);
        $this->shoppingCartServices->deleteProductInCart($productId, $this->userId, $this->isGuest);
        $basicInfoCart = $this->shoppingCartServices->getBasicInfoCartOfUser($this->userId, $this->isGuest);
        if ($this->isGuest)
            return $this->response($basicInfoCart, Response::STATUS_CUSTOM_ERROR, "UserNotLogin")->withCookie(Cookie::forever('guest_id', $this->userId));
        else
            return $this->response($basicInfoCart);
    }
}
