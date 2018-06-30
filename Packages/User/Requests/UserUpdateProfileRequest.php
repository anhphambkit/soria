<?php

namespace Packages\User\Requests;

use Packages\Core\Requests\CoreFormRequest;
use Packages\User\Permissions\Permission;
use Packages\User\Custom\Services\RoleServices;

class UserUpdateProfileRequest extends CoreFormRequest
{
    public function rules()
    {
        $id = request()['id'];
        return [
            'id'    => 'exists:users',
            'username'  => 'required|min:3|alpha_num|unique:users,username,'. $id,
            'email'  => 'required|email|unique:users,email,'. $id,
            'first_name'  => 'nullable|min:2',
            'mid_name'  => 'nullable|min:2',
            'last_name'  => 'nullable|min:2',
            'password'  => 'nullable|min:6',
            'confirm-pwd'  => 'required_with:password|same:password',
        ];
    }

    public function authorize()
    {
        $roleServices = app()->make(RoleServices::class);
        return $roleServices->hasAccess(Permission::USER_UPDATE_PROFILE);
    }

}