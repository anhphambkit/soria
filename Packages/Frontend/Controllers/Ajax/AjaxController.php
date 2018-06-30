<?php
namespace Packages\Frontend\Controllers\Ajax;

use Packages\Core\Controllers\CoreAjaxController;
use Packages\Frontend\Custom\Services\FrontendServices;

class AjaxController extends CoreAjaxController
{
    /**
     * @var FrontendServices
     */
    private $frontendServices;

    public function __construct(FrontendServices $frontendServices)
    {
        $this->frontendServices = $frontendServices;
    }

}