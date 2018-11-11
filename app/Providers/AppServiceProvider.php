<?php

namespace App\Providers;

use App\Packages\Admin\Post\Repositories\Eloquent\EloquentPostCategoryRepository;
use App\Packages\Admin\Post\Repositories\PostCategoryRepository;
use App\Packages\Admin\Post\Services\Implement\ImplementPostCategoryServices;
use App\Packages\Admin\Post\Services\PostCategoryServices;
use App\Packages\Admin\Product\Repositories\Eloquent\EloquentProductCategoryRepository;
use App\Packages\Admin\Product\Repositories\Eloquent\EloquentProductRepository;
use App\Packages\Admin\Product\Repositories\ProductCategoryRepository;
use App\Packages\Admin\Product\Repositories\ProductRepository;
use App\Packages\Admin\Product\Services\Implement\ImplementProductCategoryServices;
use App\Packages\Admin\Product\Services\Implement\ImplementProductServices;
use App\Packages\Admin\Product\Services\ProductCategoryServices;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\SystemGeneral\Services\Implement\ImplementMediaServices;
use App\Packages\SystemGeneral\Services\MediaServices;
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
        // Bind Media Services:
        $this->app->singleton(MediaServices::class, ImplementMediaServices::class);

        $this->app->singleton(ProductServices::class, ImplementProductServices::class);
        $this->app->singleton(ProductRepository::class, EloquentProductRepository::class);

        $this->app->singleton(ProductCategoryServices::class, ImplementProductCategoryServices::class);
        $this->app->singleton(ProductCategoryRepository::class, EloquentProductCategoryRepository::class);

        $this->app->singleton(PostCategoryServices::class, ImplementPostCategoryServices::class);
        $this->app->singleton(PostCategoryRepository::class, EloquentPostCategoryRepository::class);
    }
}
