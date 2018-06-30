<?php
namespace Packages\User\Providers;

use Packages\Core\Providers\CoreServiceProvider;
use Packages\User\Custom\Repositories\Eloquent\EloquentRoleRepositories;
use Packages\User\Custom\Repositories\RoleRepositories;
use Packages\User\Custom\Services\Eloquent\EloquentRoleServices;
use Packages\User\Custom\Services\RoleServices;

class PackageServiceProvider extends CoreServiceProvider
{
    /**
     * Bootstrap any application services.
     * Register package sidebar.
     */
    public function boot(){
        $this->publishes([ base_path('Packages/User/Database/Migrations') => database_path('migrations')], 'user');
        $this->addBoot();
    }



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RoleServices::class, EloquentRoleServices::class);
        $this->app->singleton(RoleRepositories::class, EloquentRoleRepositories::class);
        $this->addRegister();
    }

    /**
     * Add more hook for custom package can implement and do more
     */
    protected function addBoot(){}
    protected function addRegister(){}
}