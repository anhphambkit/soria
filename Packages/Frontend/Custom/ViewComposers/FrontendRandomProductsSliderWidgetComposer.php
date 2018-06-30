<?php
namespace Packages\Frontend\Custom\ViewComposers;
use Illuminate\View\View;
use Packages\General\Custom\Services\GeneralServices;
use Packages\Product\Custom\Services\CategoryServices;
use Packages\Product\Custom\Services\ProductServices;

class FrontendRandomProductsSliderWidgetComposer {

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $view->with('prodServices', app()->make(ProductServices::class));
    }
}