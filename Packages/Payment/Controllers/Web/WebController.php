<?php

namespace Packages\Payment\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\Payment\Custom\Services\PaymentServices;

class WebController extends Controller
{

    /**
     * Instance of EloquentPaymentService
     * @var PaymentServices
     */
    private $paymentServices;

    public function __construct(PaymentServices $paymentServices)
    {
        $this->paymentServices = $paymentServices;
    }

    /**
     * Index of Payment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('payment::index');
    }
}