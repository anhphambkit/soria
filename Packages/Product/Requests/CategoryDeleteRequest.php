<?php
namespace Packages\Product\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Custom\Services\RoleServices;

class CategoryDeleteRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'id'  => 'required|exists:product_categories',
        ];
    }

    public function authorize()
    {
        $roleServices = app()->make(RoleServices::class);
        return $roleServices->hasAccess(\Packages\Product\Permissions\Permission::PRODUCT_CATEGORY_DELETE);
    }

}