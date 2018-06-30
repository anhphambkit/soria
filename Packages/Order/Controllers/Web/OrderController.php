<?php

namespace Packages\Order\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\Order\Custom\Services\OrderServices;
use Packages\Product\Custom\Services\ProductServices;
use Packages\User\Custom\Services\UserServices;

class OrderController extends Controller
{

    /**
     * Instance of EloquentOrderService
     * @var OrderServices
     */
    private $orderServices;
    private $userServices;
    private $productServices;

    public function __construct(OrderServices $orderServices, UserServices $userServices, ProductServices $productServices)
    {
        $this->orderServices = $orderServices;
        $this->userServices = $userServices;
        $this->productServices = $productServices;
    }

    /**
     * Index of Order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $orders = $this->orderServices->all();
        return view('order::order.list', compact('orders'));
    }

    /**
     * Index of Order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $users = $this->userServices->all();
        return view('order::order.crud', compact('users'));
    }
    /**
     * @param int id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $order = $this->orderServices->get($id);
        $prodServices = $this->productServices;
        $users = $this->userServices->all();
        return view('order::order.crud', compact('order', 'users', 'prodServices'));
    }
}