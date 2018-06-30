<?php
namespace Packages\Order\Providers;

use Packages\Core\Providers\CoreServiceProvider;
use Packages\Order\Custom\Repositories\Eloquent\EloquentOrderDetailRepositories;
use Packages\Order\Custom\Repositories\OrderDetailRepositories;

class PackageServiceProvider extends CoreServiceProvider
{
    /**
     * Bootstrap any application services.
     * Register package sidebar.
     */
    public function boot(){
        $this->publishes([ base_path('Packages/Order/Database/Migrations') => database_path('migrations')], 'order');
        $this->addBoot();
    }



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderDetailRepositories::class, EloquentOrderDetailRepositories::class);
        $this->addRegister();
    }

    /**
     * Add more hook for custom package can implement and do more
     */
    protected function addBoot(){}
    protected function addRegister(){}
}