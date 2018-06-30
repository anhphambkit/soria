<?php
namespace Packages\Frontend\Providers;

use Packages\Core\Providers\CoreServiceProvider;
use Packages\Frontend\Custom\Repositories\BannerRepositories;
use Packages\Frontend\Custom\Repositories\Eloquent\EloquentBannerRepositories;
use Packages\Frontend\Custom\Services\BannerServices;
use Packages\Frontend\Custom\Services\CartServices;
use Packages\Frontend\Custom\Services\Eloquent\EloquentBannerServices;
use Packages\Frontend\Custom\Services\Eloquent\EloquentCartServices;

class PackageServiceProvider extends CoreServiceProvider
{
    /**
     * Bootstrap any application services.
     * Register package sidebar.
     */
    public function boot(){
        $this->publishes([ base_path('Packages/Frontend/Database/Migrations') => database_path('migrations')], 'frontend');
        $this->addBoot();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton(BannerServices::class, EloquentBannerServices::class);
        app()->singleton(BannerRepositories::class, EloquentBannerRepositories::class);
        app()->singleton(CartServices::class, EloquentCartServices::class);
        $this->addRegister();
    }

    /**
     * Add more hook for custom package can implement and do more
     */
    protected function addBoot(){}
    protected function addRegister(){}
}