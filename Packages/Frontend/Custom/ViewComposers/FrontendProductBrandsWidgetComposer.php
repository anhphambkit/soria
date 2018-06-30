<?php
namespace Packages\Frontend\Custom\ViewComposers;
use Illuminate\View\View;
use Packages\Product\Custom\Services\ManufacturerServices;

class FrontendProductBrandsWidgetComposer {
    private $manufacturerServices;
    public function __construct(ManufacturerServices $manufacturerServices)
    {
        $this->manufacturerServices = $manufacturerServices;
    }

    public function compose(View $view)
    {
        $view->with('brandServices', $this->manufacturerServices);
    }
}