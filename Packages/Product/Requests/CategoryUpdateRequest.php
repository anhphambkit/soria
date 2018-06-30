<?php
namespace Packages\Product\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Custom\Services\RoleServices;
use Packages\Product\Permissions\Permission;

class CategoryUpdateRequest extends CoreFormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name'  => 'required|min:2|unique:product_categories,name,'. $id. ',id',
            'parent_id'  => 'exists:product_categories,id|not_in:'. $id,
            'slug'  => 'unique:product_categories,slug,'. $id,
        ];
    }

    public function authorize()
    {
        $roleServices = app()->make(RoleServices::class);
        return $roleServices->hasAccess(Permission::PRODUCT_CATEGORY_EDIT);
    }

}