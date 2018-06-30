<?php
namespace Packages\Frontend\Custom\ViewComposers;
use Illuminate\View\View;
use Packages\General\Custom\Services\GeneralServices;
use Packages\Product\Custom\Services\CategoryServices;
use Packages\Product\Custom\Services\ProductServices;

class FrontendCategoryWidgetComposer {

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $view->with('catServices', app()->make(CategoryServices::class));
    }
}