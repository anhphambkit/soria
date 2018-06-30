<?php
namespace Packages\Payment\Providers;

use Packages\Core\Providers\CoreServiceProvider;

class PackageServiceProvider extends CoreServiceProvider
{
    /**
     * Bootstrap any application services.
     * Register package sidebar.
     */
    public function boot(){
        // $this->publishes([ base_path('Packages/Payment/Database/Migrations') => database_path('migrations')], 'payment');
        $this->addBoot();
    }



    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->addRegister();
    }

    /**
     * Add more hook for custom package can implement and do more
     */
    protected function addBoot(){}
    protected function addRegister(){}
}