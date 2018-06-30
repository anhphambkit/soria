<?php

namespace Packages\Product\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Product\Custom\Repositories\CategoryRepositories;
use Packages\Product\Custom\Repositories\Eloquent\EloquentCategoryRepositories;
use Packages\Product\Custom\Repositories\Eloquent\EloquentManufacturerRepositories;
use Packages\Product\Custom\Repositories\Eloquent\EloquentProductCategoryRepositories;
use Packages\Product\Custom\Repositories\ManufacturerRepositories;
use Packages\Product\Custom\Repositories\ProductCategoryRepositories;
use Packages\Product\Custom\Services\CategoryServices;
use Packages\Product\Custom\Services\Eloquent\EloquentCategoryServices;
use Packages\Product\Custom\Services\Eloquent\EloquentManufacturerServices;
use Packages\Product\Custom\Services\ManufacturerServices;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * Register package sidebar.
     */
    public function boot(){
        $this->publishes([
            base_path('Packages/Product/Database/Migrations') => database_path('migrations'),
        ], 'product');
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
        app()->bind(ProductCategoryRepositories::class, EloquentProductCategoryRepositories::class);
        app()->bind(ManufacturerServices::class, EloquentManufacturerServices::class);
        app()->bind(ManufacturerRepositories::class, EloquentManufacturerRepositories::class);
        $this->addRegister();
    }

    protected function addRegister(){}
    protected function addBoot(){}
}