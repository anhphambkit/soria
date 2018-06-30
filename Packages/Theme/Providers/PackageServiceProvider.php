<?php

/**
 * Created by PhpStorm.
 * User: minh.truong
 * Date: 3/23/18
 * Time: 11:56 AM
 */
namespace Packages\Theme\Providers;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * Register package sidebar.
     */
    public function boot(){
        $this->publishes([
            base_path('Packages/Theme/Resources/assets/vendors') => public_path('packages/theme/vendors'),
        ], 'theme');
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

    public function addBoot(){}
    public function addRegister(){}
}