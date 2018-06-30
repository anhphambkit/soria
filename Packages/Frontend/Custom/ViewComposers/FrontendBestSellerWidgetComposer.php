<?php
namespace Packages\Frontend\Custom\ViewComposers;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Packages\General\Custom\Services\GeneralServices;
use Packages\Product\Custom\Services\CategoryServices;
use Packages\Product\Custom\Services\ProductServices;

class FrontendBestSellerWidgetComposer {

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $products = Cache::remember('bestseller_products', env('SESSION_LIFETIME', 120), function(){
            return app()->make(ProductServices::class)->filter(['status'   => 'P', 'is_best_seller' => true])->orderBy('created_at', 'desc')->take(config('frontend.limit-bestseller'))->get();
        });
        $view->with('products', $products);
    }
}