<?php
namespace Packages\Post\Providers;

use Packages\Core\Providers\CoreServiceProvider;
use Packages\Post\Custom\Repositories\CategoryRepositories;
use Packages\Post\Custom\Repositories\Eloquent\EloquentCategoryRepositories;
use Packages\Post\Custom\Services\CategoryServices;
use Packages\Post\Custom\Services\Eloquent\EloquentCategoryServices;

class PackageServiceProvider extends CoreServiceProvider
{
    /**
     * Bootstrap any application services.
     * Register package sidebar.
     */
    public function boot(){
        $this->publishes([ base_path('Packages/Post/Database/Migrations') => database_path('migrations')], 'post');
        $this->addBoot();
    }



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(CategoryRepositories::class, EloquentCategoryRepositories::class);
        app()->bind(CategoryServices::class, EloquentCategoryServices::class);
        $this->addRegister();
    }

    /**
     * Add more hook for custom package can implement and do more
     */
    protected function addBoot(){}
    protected function addRegister(){}
}