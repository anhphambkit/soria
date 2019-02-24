<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 08:28
 */

namespace App\Http\Requests\Shop;


use App\Core\Requests\CoreFormRequest;

class DeleteOrDetailAddressShippingRequest extends CoreFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address_id' => 'required',
        ];
    }
}