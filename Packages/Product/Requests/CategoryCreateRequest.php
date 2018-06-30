<?php
namespace Packages\Product\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Custom\Services\RoleServices;
use Packages\Product\Permissions\Permission;

class CategoryCreateRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'name'  => 'required|min:2|unique:product_categories,name',
            'parent_id'  => 'exists:product_categories,id',
            'slug'  => 'unique:product_categories,slug',
        ];
    }

    public function authorize()
    {
        $roleServices = app()->make(RoleServices::class);
        return $roleServices->hasAccess(Permission::PRODUCT_CATEGORY_CREATE);
    }

}