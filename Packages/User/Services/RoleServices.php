<?php
/**
 * The interface of role services
 */
namespace Packages\User\Services;

use Packages\User\Entities\Role;
use Packages\User\Entities\User;

interface RoleServices {
    /**
     * Get model by Id
     * @param $id
     * @return Role | null
     */
    public function get($id);

    /**
     * Delete model by Id
     * @param $id
     * @return boolean
     */
    public function delete($id);

    /**
     * Update new data to model
     * @param $id
     * @param array $data : List new values to update
     * @return boolean
     */
    public function update($id, $data);

    /**
     * Get all
     * @return array
     */
    public function all();
    /**
     * Get all permissions by role id
     * @param $roleId
     * @return array
     */
    public function getPermissions($roleId);

    /**
     * Check permission is granted to access. Root (admin) who have id = 1 will pass all
     * @param String $permission
     * @param User | null $user : If null we will set to default auth()->user()
     * @return boolean
     */
    public function hasAccess($permission, $user = null);

    /**
     * Check Role if have permission
     * @param $roleId
     * @param $permission
     * @return boolean
     */
    public function roleHasAccess($roleId, $permission);
}