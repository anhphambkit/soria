<?php
namespace Packages\Payment\Controllers\Ajax;

use Packages\Core\Controllers\CoreAjaxController;
use Packages\Payment\Custom\Services\PaymentServices;

class AjaxController extends CoreAjaxController
{
    /**
     * @var PaymentServices
     */
    private $paymentServices;

    public function __construct(PaymentServices $paymentServices)
    {
        $this->paymentServices = $paymentServices;
    }

}