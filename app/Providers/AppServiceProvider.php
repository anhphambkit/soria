<?php

namespace App\Providers;

use App\Packages\Admin\Repositories\Eloquent\EloquentProductCategoryRepository;
use App\Packages\Admin\Repositories\ProductCategoryRepository;
use App\Packages\Admin\Services\Implement\ImplementProductCategoryServices;
use App\Packages\Admin\Services\ProductCategoryServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        $this->register();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
//        $this->app->singleton(ProductCategoryServices::class, ImplementProductCategoryServices::class);
//        $this->app->singleton(ProductCategoryRepository::class, EloquentProductCategoryRepository::class);
    }
}
