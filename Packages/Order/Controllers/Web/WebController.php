<?php

namespace Packages\Order\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\Order\Custom\Services\OrderServices;

class WebController extends Controller
{

    /**
     * Instance of EloquentOrderService
     * @var OrderServices
     */
    private $orderServices;

    public function __construct(OrderServices $orderServices)
    {
        $this->orderServices = $orderServices;
    }

    /**
     * Index of Order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
    }
}