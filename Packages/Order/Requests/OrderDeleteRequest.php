<?php
namespace Packages\Order\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\Order\Custom\Services\OrderServices;

class OrderDeleteRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'id'  => 'required|exists:orders,id',
        ];
    }
}