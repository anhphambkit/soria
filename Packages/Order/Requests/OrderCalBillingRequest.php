<?php
namespace Packages\Order\Requests;
use Packages\Core\Requests\CoreFormRequest;

class OrderCalBillingRequest extends CoreFormRequest
{
    public function rules()
    {
        $a=1;
        return [
            'tax'  => 'required|numeric|min:0|max:100',
            'fee_ship'  => 'required|numeric|min:0',
            'products'  => 'required|array',
            'products.*.quantity'  => 'required|numeric|min:1',
            'products.*.product_id'  => 'required|exists:products,id',
        ];
    }
}