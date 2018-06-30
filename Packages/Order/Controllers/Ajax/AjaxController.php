<?php
namespace Packages\Order\Controllers\Ajax;

use Packages\Core\Controllers\CoreAjaxController;
use Packages\Order\Custom\Services\OrderServices;

class AjaxController extends CoreAjaxController
{
    /**
     * @var OrderServices
     */
    private $orderServices;

    public function __construct(OrderServices $orderServices)
    {
        $this->orderServices = $orderServices;
    }

}