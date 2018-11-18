<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/11/18
 * Time: 21:43
 */

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Core\Requests\CoreFormRequest;

class CreateProductRequest extends CoreFormRequest
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
            'name' => 'required',
            'slug' => 'required',
            'sku' => 'required',
            'desc' => 'required',
            'is_publish' => 'required',
            'is_feature' => 'required',
            'is_best_seller' => 'required',
            'is_free_ship' => 'required',
            'price' => 'required|numeric',
            'manager_stock' => 'required',
            'allow_order' => 'required',
            'rating' => 'required|int',
            'imgFeatures' => 'required',
        ];
    }
}
