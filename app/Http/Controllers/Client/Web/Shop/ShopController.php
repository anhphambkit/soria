<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/12/19
 * Time: 11:20
 */

namespace App\Http\Controllers\Client\Web\Shop;


use App\Http\Controllers\SystemGeneral\Web\BaseShopController;
use App\Packages\Admin\Product\Services\GuestInfoServices;
use App\Packages\Admin\Product\Services\ProductCategoryServices;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\Admin\Product\Services\ShoppingCartServices;
use App\Packages\Shop\Services\AddressBookServices;
use App\Packages\SystemGeneral\Services\AddressGeneralInfoService;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;
use App\Packages\SystemGeneral\Services\HelperServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class ShopController extends BaseShopController {

    protected $helperServices;
    protected $productServices;
    protected $shoppingCartServices;
    protected $guestInfoServices;
    protected $addressGeneralInfoService;
    protected $addressBookServices;
    protected $userId;
    protected $isGuest;
    protected $totalItems;
    public function __construct(
                                HelperServices $helperServices, ProductServices $productServices,
                                ShoppingCartServices $shoppingCartServices, GuestInfoServices $guestInfoServices,
                                AddressGeneralInfoService $addressGeneralInfoService,
                                AddressBookServices $addressBookServices, ProductCategoryServices $productCategoryServices,
                                GeneralSettingServices $generalSettingServices
                                )
    {
        parent::__construct($productCategoryServices, $generalSettingServices);

        $this->helperServices = $helperServices;
        $this->productServices = $productServices;
        $this->shoppingCartServices = $shoppingCartServices;
        $this->guestInfoServices = $guestInfoServices;
        $this->addressGeneralInfoService = $addressGeneralInfoService;
        $this->addressBookServices = $addressBookServices;
        $this->isGuest = true;
        if (Auth::check()) {
            $this->userId = Auth::id();
            $this->isGuest = false;
        }
        else
            $this->userId = Cookie::get('guest_id');


        if (!empty($this->userId) && $this->userId > 0)
            $this->totalItems = $this->shoppingCartServices->getTotalItemsInCart($this->userId, $this->isGuest);
        else
            $this->totalItems = 0;

        View::share("totalItems", $this->totalItems);
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
     * @param $urlProduct
     * @return mixed
     */
    public function viewDetailProduct($urlProduct) {
        $productId = $this->helperServices->getIdFromUrl($urlProduct);
        if (!$productId) {
            return abort(404);
        }

        $product = $this->productServices->getDetailProduct($productId);
        $relatedProducts = $this->productServices->getRelatedProductByCategories($product->categories);
        return view(config('setting.theme.shop') . '.pages.product-detail', compact('product', 'relatedProducts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart() {
        $cart = $this->shoppingCartServices->getBasicInfoCartOfUser($this->userId, $this->isGuest);
//        dd($basicInfoCart);
        return view(config('setting.theme.shop') . '.pages.cart', compact('cart'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkoutShipping() {
        $provincesCities = $this->addressGeneralInfoService->getProvincesCitiesByCountryId();
        $cart = $this->shoppingCartServices->getBasicInfoCartOfUser($this->userId, $this->isGuest);
        $addressBooks = $this->addressBookServices->getAddressBooks($this->userId, $this->isGuest);
        return view(config('setting.theme.shop') . '.pages.checkout-shipping', compact('cart', 'provincesCities', 'addressBooks'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkoutPayment() {
        $cart = $this->shoppingCartServices->getBasicInfoCartOfUser($this->userId, $this->isGuest);
        $addressShipping = $this->addressBookServices->getDetailAddressShippingSelected($this->userId, $this->isGuest);
        return view(config('setting.theme.shop') . '.pages.checkout-payment', compact('cart', 'addressShipping'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function completeOrder() {
        return view(config('setting.theme.shop') . '.pages.complete-order');
    }

    public function viewCategoryPage($urlCategory) {
        $categoryId = $this->helperServices->getIdFromUrl($urlCategory);
        if (!$categoryId) {
            return abort(404);
        }
        $category = $this->productCategoryServices->getDetailProductCategory($categoryId);
        $categoryProducts = $this->productServices->getAllProductsOfCategoryById($categoryId);
//        dd($categoryProducts);
        return view(config('setting.theme.shop') . '.pages.category', compact('category', 'categoryProducts'));
    }
}