<?php
namespace Packages\Order\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\Order\Custom\Services\OrderServices;

class OrderUpdateRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'shipping_address'  => 'required|min:5',
            'customer_phone'  => 'required|min:5',
            'customer_name'  => 'required|min:3',
            'payment_type'  => 'required|in:COD,PAY',
            'payment_status'  => 'required|in:P,C',
            'shipping_status'  => 'required|in:I,O,C',
            'tax'  => 'required|numeric|min:0|max:100',
            'fee_ship'  => 'required|numeric|min:0',
            'user_id'  => 'nullable|exists:users,id',
            'products'  => 'required|array',
            'products.*.quantity'  => 'required|numeric|min:1',
            'products.*.product_id'  => 'required|exists:products,id',
        ];
    }

    public function afterPasses()
    {
        $orderServices = app()->make(OrderServices::class);
        $billing = $orderServices->calBilling($this->request->get('products'), false, $this->request->get('tax'), $this->request->get('fee_ship'));
        $billingRequest = [
            'tax'   => $billing['tax'],
            'tax_value'   => $billing['taxValue'],
            'total'   => $billing['total'],
            'fee_ship'   => $billing['feeShip'],
        ];
        $this->merge($billingRequest);
    }
}