<?php
namespace Packages\Frontend\Requests;
use Packages\Core\Requests\CoreFormRequest;

class CartAddRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'qty'  => 'required|numeric|min:1',
            'id'  => 'required|exists:products,id',
        ];
    }

    public function authorize()
    {
        return true;
    }

}