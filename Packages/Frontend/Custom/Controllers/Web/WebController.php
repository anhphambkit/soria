<?php
namespace Packages\Frontend\Custom\Controllers\Web;

use Packages\Frontend\Controllers\Web\WebController as CoreController;
use Packages\Frontend\Custom\Services\BannerServices;
use Packages\Frontend\Custom\Services\CartServices;
use Packages\Frontend\Custom\Services\FrontendServices;
use Packages\General\Custom\Services\GeneralServices;
use Packages\Product\Custom\Services\CategoryServices;
use Packages\Product\Custom\Services\ProductServices;

class WebController extends CoreController
{
    private $bannerServices;

    public function __construct(FrontendServices $frontendServices, BannerServices $bannerServices)
    {
        parent::__construct($frontendServices);
        $this->bannerServices = $bannerServices;
    }

    /**
     * Index of Frontend
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $prodServices = app()->make(ProductServices::class);
        $catServices = app()->make(CategoryServices::class);
        $configServices = app()->make(GeneralServices::class);
        $slider = $this->bannerServices->filter(['slug' => config('frontend.home.slider-slug')])->first();
        return view('frontend.custom::index', compact('prodServices', 'slider', 'catServices', 'configServices'));

    }

    /**
     * Index of Product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productDetail($slug){
        $prodServices = app()->make(ProductServices::class);
        $catServices = app()->make(CategoryServices::class);
        $configServices = app()->make(GeneralServices::class);
        $p = $prodServices->filter(['slug'  => $slug])->first();
        return view('frontend.custom::detail', compact('p', 'prodServices', 'catServices', 'configServices'));
    }

    /**
     * Index of Cart
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cartDetail(){
        $prodServices = app()->make(ProductServices::class);
        $catServices = app()->make(CategoryServices::class);
        $cartServices = app()->make(CartServices::class);
        $configServices = app()->make(GeneralServices::class);
        return view('frontend.custom::cart', compact('prodServices', 'catServices', 'configServices', 'cartServices'));
    }
}