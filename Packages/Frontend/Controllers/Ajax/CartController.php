<?php

namespace Packages\Frontend\Controllers\Ajax;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Packages\Core\Controllers\CoreAjaxController;
use Packages\Frontend\Custom\Services\BannerServices;
use Packages\Frontend\Custom\Services\CartServices;
use Packages\Frontend\Custom\Services\FrontendServices;
use Packages\Frontend\Requests\BannerCreateRequest;
use Packages\Frontend\Requests\BannerDeleteRequest;
use Packages\Frontend\Requests\BannerUpdateRequest;
use Packages\Frontend\Requests\CartAddRequest;
use Packages\Frontend\Requests\CartCheckoutRequest;
use Packages\Order\Custom\Services\OrderServices;
use Packages\Order\Requests\OrderCreateRequest;
use Packages\Product\Custom\Services\ProductServices;

class CartController extends CoreAjaxController
{

    /**
     * @var CartServices
     */
    private $cartServices;
    private $orderServices;

    public function __construct(CartServices $cartServices, OrderServices $orderServices)
    {
        $this->cartServices = $cartServices;
        $this->orderServices = $orderServices;
    }

    /**
     * @param CartAddRequest $cartAddRequest
     * @return mixed
     */
    public function add(CartAddRequest $cartAddRequest){
        return $this->response($this->cartServices->add($cartAddRequest['id'], $cartAddRequest['qty']));
    }

    /**
     * @param $rowId
     * @return
     */
    public function update($rowId){
        return $this->response($this->cartServices->update($rowId, request()->all()));
    }

    public function remove($rowId){
        return $this->response($this->cartServices->remove($rowId));
    }

    public function destroy(){
        return $this->response($this->cartServices->destroy());
    }

    public function checkout(CartCheckoutRequest $cartCheckoutRequest){
        $cartInfo = $cartCheckoutRequest->all();
        $created = $this->cartServices->checkout($cartInfo);
        return $this->response($created);
    }
}