<?php

namespace Packages\Media\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Media\Custom\Repositories\Eloquent\EloquentMediaRepositories;
use Packages\Media\Custom\Repositories\MediaRepositories;
use Packages\Media\Custom\Services\Eloquent\EloquentMediaServices;
use Packages\Media\Custom\Services\MediaServices;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * Register package sidebar.
     */
    public function boot(){
        $this->publishes([
            base_path('Packages/Media/Database/Migrations') => database_path('migrations'),
            base_path('Packages/Media/Resources/assets/vendors') => public_path('packages/media/vendors'),
        ], 'media');
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

    protected function addRegister(){}
    protected function addBoot(){}
}