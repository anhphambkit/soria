<?php
namespace Packages\User\Repositories;
interface RoleRepositories {
    /**
     * Get all permissions by role id
     * @param $roleId
     * @return array
     */
    public function getPermissions($roleId);
}