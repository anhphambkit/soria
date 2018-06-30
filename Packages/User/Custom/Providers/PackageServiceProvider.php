<?php
namespace Packages\User\Custom\Providers;

use Packages\User\Custom\Repositories\Eloquent\EloquentRoleRepositories;
use Packages\User\Custom\Repositories\RoleRepositories;
use Packages\User\Custom\Services\Eloquent\EloquentRoleServices;
use Packages\User\Custom\Services\RoleServices;

class PackageServiceProvider extends \Packages\User\Providers\PackageServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    protected function addRegister()
    {
    }
}