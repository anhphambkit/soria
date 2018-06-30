<?php
/**
 * Role service implemented
 */
namespace Packages\User\Services\Eloquent;
use Illuminate\Support\Facades\Cache;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\User\Entities\Role;
use Packages\User\Entities\User;
use Packages\User\Custom\Repositories\RoleRepositories;
use Packages\User\Services\RoleServices;

class EloquentRoleServices implements RoleServices {
    use PackageServicesTrait;

    private $repositories;
    public function __construct(RoleRepositories $repositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new Role());
    }

    public function get($id)
    {
        $role = $this->repositories->get($id);
        if(!empty($role)){
            if($role->permissions != '*'){
                $role->permissions = json_decode($role->permissions);
            }
            return $role;
        }
        return null;
    }

    /**
     * Get all permissions by role id
     * @param $roleId
     * @return array
     */
    public function getPermissions($roleId)
    {
        return $this->repositories->getPermissions($roleId);
    }

    /**
     * Check permission is granted to access. Root (admin) who have id = 1 will pass all
     * @param String $permission
     * @param User | null $user : If null we will set to default auth()->user()
     * @return boolean
     */
    public function hasAccess($permission, $user = null) {
        $user = ($user == null) ? (auth()->user()?:null) : $user;
        if($user == null){
            return false;
        }

        return Cache::remember('RoleServices_hasAccess_'.$permission.'_'. $user->getKey(), env('SESSION_LIFETIME', 120), function () use($user, $permission){
            if ($user->role()->first()->permissions === '*'){
                return true;
            }
            $userPermissions = $user->permissions ? collect(json_decode($user->permissions, true)) : collect();
            $rolePermissions = $this->getPermissions($user->role_id);
            $permissions = $userPermissions->merge($rolePermissions);

            foreach ($permissions->all() as $gotPermission){
                if($permission === $gotPermission){
                    return true;
                }
            }
            return false;
        });
    }

    /**
     * Check Role if have permission
     * @param $roleId
     * @param $permission
     * @return boolean
     */
    public function roleHasAccess($roleId, $permission)
    {
        return Cache::remember('RoleServices_roleHasAccess_'.$roleId.'_'. $permission, env('SESSION_LIFETIME', 120), function () use($roleId, $permission){
            $permissions = $this->get($roleId)->permissions;
            if($permissions === '*') {
                return true;
            }
            return in_array($permission, $permissions);
        });
    }

    public function update($id, $data)
    {
        Cache::flush();
        return $this->repositories->update($id,$data);
    }
}