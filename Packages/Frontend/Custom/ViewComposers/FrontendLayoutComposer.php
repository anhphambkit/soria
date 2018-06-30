<?php
namespace Packages\Frontend\Custom\ViewComposers;
use Illuminate\View\View;
use Packages\Frontend\Custom\Services\CartServices;
use Packages\General\Custom\Services\GeneralServices;
use Packages\Product\Custom\Services\CategoryServices;
use Packages\Product\Custom\Services\ProductServices;

class FrontendLayoutComposer {

    /**
     * @var $categoryServices
     */
    private $categoryServices;

    /**
     * @var $productServices;
     */
    private $productServices;
    /**
     * @var $cartServices;
     */
    private $cartServices;


    public function __construct(CategoryServices $categoryServices, ProductServices $productServices, CartServices $cartServices)
    {
        $this->categoryServices = $categoryServices;
        $this->productServices = $productServices;
        $this->cartServices = $cartServices;
    }

    public function compose(View $view)
    {
        $view->with('catCameras', $this->categoryServices->get(config('frontend.menu.camera.id')));
        $view->with('catServices', $this->categoryServices);
        $view->with('prodServices', $this->productServices);
        $view->with('cartServices', $this->cartServices);

        $generalConfig = app()->make(GeneralServices::class);
        $view->with('config', $generalConfig->get());
    }
}