<?php
namespace Packages\Order\Requests;
use Packages\Core\Requests\CoreFormRequest;

class OrderCreateRequest extends CoreFormRequest
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
            'tax'  => 'nullable|numeric|min:0|max:100',
            'fee_ship'  => 'nullable|numeric|min:0',
            'user_id'  => 'nullable|exists:users,id',
        ];
    }
}