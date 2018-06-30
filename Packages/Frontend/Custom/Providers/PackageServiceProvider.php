<?php
namespace Packages\Frontend\Custom\Providers;

use Illuminate\Support\Facades\View;
use Packages\Frontend\Custom\ViewComposers\FrontendBannerWidgetComposer;
use Packages\Frontend\Custom\ViewComposers\FrontendBestSellerWidgetComposer;
use Packages\Frontend\Custom\ViewComposers\FrontendCategoryWidgetComposer;
use Packages\Frontend\Custom\ViewComposers\FrontendLayoutComposer;
use Packages\Frontend\Custom\ViewComposers\FrontendProductBrandsWidgetComposer;
use Packages\Frontend\Custom\ViewComposers\FrontendRandomProductsSliderWidgetComposer;

class PackageServiceProvider extends \Packages\Frontend\Providers\PackageServiceProvider
{
    protected function addBoot()
    {
        $this->publishes([ base_path('Packages/Frontend/Custom/Resources/assets/vendors') => public_path('assets/vendors')], 'frontend');
        $this->viewCompose();
    }

    /**
     * Register variable for particular view when it's called
     */
    public function viewCompose(){
        View::composer('frontend.custom::layouts.frontend', FrontendLayoutComposer::class);
        View::composer('frontend.custom::components.widgets.categories', FrontendCategoryWidgetComposer::class);
        View::composer('frontend.custom::components.widgets.bestseller', FrontendBestSellerWidgetComposer::class);
        View::composer('frontend.custom::components.widgets.banner', FrontendBannerWidgetComposer::class);
        View::composer('frontend.custom::components.widgets.random-products-slider', FrontendRandomProductsSliderWidgetComposer::class);
        View::composer('frontend.custom::components.widgets.product-brands', FrontendProductBrandsWidgetComposer::class);
    }
}