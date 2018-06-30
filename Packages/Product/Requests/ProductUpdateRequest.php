<?php
namespace Packages\Product\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Custom\Services\RoleServices;

class ProductUpdateRequest extends CoreFormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name'  => 'required|min:2|unique:products,name,'. $id. ',id',
            'sku'  => 'required|min:2|unique:products,sku,'. $id. ',id',
            'price'  => 'required|numeric|min:0',
            'sale_type'  => 'in:0,A,P',
            'sale_value'  => 'nullable|numeric|min:0',
            'slug'  => 'required|unique:products,slug,'. $id. ',id',
            'status'  => 'required|in:D,P',
            'categories'  => 'nullable|array',
            'categories.*'  => 'exists:product_categories,id|distinct',
            'img_id'  => 'nullable|exists:media,id',
            'related_img.*'  => 'exists:media,id',
        ];
    }

    public function authorize()
    {
        $roleServices = app()->make(RoleServices::class);
        return $roleServices->hasAccess(\Packages\Product\Permissions\Permission::PRODUCT_EDIT);
    }

}