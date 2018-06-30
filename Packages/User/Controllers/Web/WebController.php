<?php

namespace Packages\User\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\Core\Services\CoreRoleServices;
use Packages\User\Custom\Services\RoleServices;
use Packages\User\Custom\Services\UserServices;

class WebController extends Controller
{

    /**
     * Instance of EloquentUserService
     * @var CoreRoleServices
     */
    private $userServices;

    /**
     * Instance of EloquentRoleService
     * @var CoreRoleServices
     */
    private $roleServices;

    /**
     * Instance of EloquentCoreRoleService
     * @var CoreRoleServices
     */
    private $coreRoleService;
    public function __construct(UserServices $userServices, RoleServices $roleServices, CoreRoleServices $coreRoleServices)
    {
        $this->userServices = $userServices;
        $this->roleServices = $roleServices;
        $this->coreRoleService = $coreRoleServices;
    }

    /**
     * Setting User Profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(){
        $roles = $this->roleServices->all();
        $user = auth()->user();
        return view('user::profile', compact('roles', 'user'));
    }

    /**
     * List roles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roles(){
        $roles = $this->roleServices->all();
        return view('user::role.index', compact('roles'));
    }

    /**
     * Page edit role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editRole($id){
        $role = $this->roleServices->get($id);
        $packages = $this->coreRoleService->listPermissions();
        $roleServices = $this->roleServices;
        return view('user::role.edit', compact('role', 'packages', 'roleServices'));
    }



    /**
     * Login page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(){
        return view('user::login');
    }

    /**
     * Execute post request Login
     */
    public function doLogin(){
        $email = request()['email'] ?: null;
        $password = request()['password'] ?: null;

        $result = $this->userServices->doLogin($email, $password, true);
    }
}