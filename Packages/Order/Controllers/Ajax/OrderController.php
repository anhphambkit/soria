<?php
namespace Packages\Order\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Packages\Core\Controllers\CoreAjaxController;
use Packages\Frontend\Custom\Services\CartServices;
use Packages\Order\Custom\Services\OrderServices;
use Packages\Order\Requests\OrderCalBillingRequest;
use Packages\Order\Requests\OrderCreateRequest;
use Packages\Order\Requests\OrderDeleteRequest;
use Packages\Order\Requests\OrderUpdateRequest;
use Packages\Product\Custom\Services\ProductServices;

class OrderController extends CoreAjaxController
{
    /**
     * @var OrderServices
     */
    private $orderServices;

    public function __construct(OrderServices $orderServices)
    {
        $this->orderServices = $orderServices;
    }

    public function create(OrderCreateRequest $orderCreateRequest){
        $cartInfo = $orderCreateRequest->all();
        $billCalculation = $this->orderServices->calBilling($cartInfo['products'], false, $cartInfo['tax'], $cartInfo['fee_ship']);
        $cartInfo = array_merge($cartInfo, [
            'tax'   => $billCalculation['tax'],
            'total'   => $billCalculation['total'],
            'fee_ship'   => $billCalculation['feeShip'],
        ]);
        return $this->response($this->orderServices->crud($orderCreateRequest->all()));
    }

    public function update(OrderUpdateRequest $orderUpdateRequest, $id){
        return $this->response($this->orderServices->crud($orderUpdateRequest->all(), $id));
    }

    public function delete(OrderDeleteRequest $orderDeleteRequest){
        return $this->response($this->orderServices->delete($orderDeleteRequest->get('id')));
    }

    /**
     * Calculate billing before process an order
     * @param OrderCalBillingRequest $orderCalBillingRequest
     * @return mixed
     */
    public function calBilling(OrderCalBillingRequest $orderCalBillingRequest){
        return $this->response($this->orderServices->calBilling($orderCalBillingRequest->get('products'), false, $orderCalBillingRequest->get('tax'), $orderCalBillingRequest->get('fee_ship')));
    }

}