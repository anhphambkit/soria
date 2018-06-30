<?php
namespace Packages\Post\Requests;
use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Custom\Services\RoleServices;
use Packages\Post\Permissions\Permission;

class CategoryUpdateRequest extends CoreFormRequest
{
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name'  => 'required|min:2|unique:post_categories,name,'. $id. ',id',
            'parent_id'  => 'exists:post_categories,id|not_in:'. $id,
            'slug'  => 'unique:post_categories,slug,'. $id,
        ];
    }
}