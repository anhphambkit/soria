<?php

namespace Packages\User\Requests;

use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Permissions\Permission;
use Packages\User\Custom\Services\RoleServices;

class RoleUpdateRequest extends CoreFormRequest
{
    public function rules()
    {
        $id = request()['id'];
        return [
            'name'  => 'required|min:2|alpha_num|unique:roles,name,'. $id,
        ];
    }

    public function authorize()
    {
        $roleServices = app()->make(RoleServices::class);
        return $roleServices->hasAccess(Permission::ROLE_UPDATE_ROLES);
    }

}