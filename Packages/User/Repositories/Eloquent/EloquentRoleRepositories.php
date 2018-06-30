<?php
/**
 * Role repository implemented
 */
namespace Packages\User\Repositories\Eloquent;
use Packages\Core\Traits\Repositories\PackageRepositoriesTrait;
use Packages\User\Repositories\RoleRepositories;

class EloquentRoleRepositories implements RoleRepositories {
    use PackageRepositoriesTrait;
    public function __construct() {
    }

    /**
     * Get all permissions by role id
     * @param $roleId
     * @return array
     */
    public function getPermissions($roleId)
    {
        $permissions = $this->get($roleId)->permissions;
        if(!empty($permissions)){
            return collect(json_decode($permissions,true));
        }
        return collect();
    }
}