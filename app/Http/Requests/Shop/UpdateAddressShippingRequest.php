<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 08:27
 */

namespace App\Http\Requests\Shop;


use App\Core\Requests\CoreFormRequest;

class UpdateAddressShippingRequest extends CoreFormRequest
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
            'id' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'district_code' => 'required',
            'full_name' => 'required',
            'mobile_phone' => 'required',
            'province_city_code' => 'required',
            'ward_code' => 'required',
            'name_address_book' => 'required',
        ];
    }
}