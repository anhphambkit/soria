<?php

namespace Packages\User\Requests;

use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Permissions\Permission;
use Packages\User\Custom\Services\RoleServices;

class UserUpdateRoleRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'userId'        => 'exists:users',
            'role_id'   => 'exists:roles,id',
        ];
    }

    public function authorize()
    {
        $roleServices = app()->make(RoleServices::class);
        return $roleServices->hasAccess(Permission::USER_UPDATE_PROFILE);
    }

}