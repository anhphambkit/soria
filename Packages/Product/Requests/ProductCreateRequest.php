<?php
namespace Packages\Product\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Custom\Services\RoleServices;

class ProductCreateRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'name'  => 'required|min:2|unique:products,name',
            'sku'  => 'required|min:2|unique:products,sku',
            'price'  => 'required|numeric|min:0',
            'sale_type'  => 'in:0,A,P',
            'sale_value'  => 'nullable|numeric|min:0',
            'slug'  => 'required|unique:products,slug',
            'status'  => 'required|in:D,P',
            'categories'  => 'array',
            'categories.*'  => 'exists:product_categories,id|distinct',
            'img_id'  => 'nullable|exists:media,id',
            'related_img.*'  => 'exists:media,id',
        ];
    }

    public function authorize()
    {
        $roleServices = app()->make(RoleServices::class);
        return $roleServices->hasAccess(\Packages\Product\Permissions\Permission::PRODUCT_CREATE);
    }

}