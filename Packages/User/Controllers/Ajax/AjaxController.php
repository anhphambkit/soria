<?php

namespace Packages\User\Controllers\Ajax;

use Packages\Core\Controllers\CoreAjaxController;
use Packages\Core\Response\Response;
use Packages\User\Custom\Services\ProductServices;
use Packages\User\Custom\Services\RoleServices;
use Packages\User\Custom\Services\UserServices;
use Packages\User\Requests\RoleUpdateRequest;
use Packages\User\Requests\UserUpdateProfileRequest;
use Packages\User\Requests\UserUpdateRoleRequest;

class AjaxController extends CoreAjaxController
{
    /**
     * @var RoleServices
     */
    private $roleServices;

    /**
     * @var UserServices
     */
    private $userServices;

    public function __construct(RoleServices $roleServices, UserServices $userServices)
    {
        $this->roleServices = $roleServices;
        $this->userServices = $userServices;
    }

    /**
     * Get dedicated user
     * @param $id: user id
     */
    public function getUser($id){
        $user = $this->userServices->get($id);
        if(empty($user)){
            $this->response(null, Response::STATUS_NOT_FOUND_ERROR);
        }
        $this->response($user);
    }

    /**
     * Get role
     * @param $id: role id
     */
    public function getRole($id){
        $role = $this->roleServices->get($id);
        if(empty($role)){
            $this->response(null, Response::STATUS_NOT_FOUND_ERROR);
        }
        $this->response($role);
    }

    /**
     * Update Role but prevent update root (which always have id = 1)
     * @param RoleUpdateRequest $roleUpdateRequest
     * @param $id
     */
    public function roleUpdate(RoleUpdateRequest $roleUpdateRequest, $id){
        $permissions = collect(request()->all()['permissions']);
        $storePermissions = [];
        foreach($permissions as $p => $isOn){
            if($isOn === 'on'){
                $storePermissions[] = strtoupper(str_replace('\'','', $p));
            }
        }
        $updated = $this->roleServices->update($id, ['permissions' => json_encode($storePermissions), 'name'    => request()['name']]);
        $this->response($updated);
    }

    /**
     * Update profile user
     * @param UserUpdateProfileRequest $userUpdateProfileRequest
     * @param $id
     */
    public function userUpdate(UserUpdateProfileRequest $userUpdateProfileRequest, $id){
        $this->removeNullParams();
        $updated = $this->userServices->update($id, request()->all());
        $this->response($updated);
    }

    /**
     * Update role of user
     * @param UserUpdateRoleRequest $userUpdateRoleRequest
     * @param $userId
     */
    public function userUpdateRole(UserUpdateRoleRequest $userUpdateRoleRequest, $userId){
        $updated = $this->userServices->update($userId, ['role_id'  => request()['role_id'] ]);
        $this->response($updated);
    }
}