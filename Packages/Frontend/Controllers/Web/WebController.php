<?php

namespace Packages\Frontend\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\Frontend\Custom\Services\FrontendServices;
use Packages\Product\Custom\Services\ProductServices;

class WebController extends Controller
{

    /**
     * Instance of EloquentFrontendService
     * @var FrontendServices
     */
    private $frontendServices;

    public function __construct(FrontendServices $frontendServices)
    {
        $this->frontendServices = $frontendServices;
    }


}