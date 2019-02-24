<?php

namespace App\Providers;

use App\Packages\Admin\Post\Repositories\Eloquent\EloquentPostCategoryRepository;
use App\Packages\Admin\Post\Repositories\Eloquent\EloquentPostRepository;
use App\Packages\Admin\Post\Repositories\PostCategoryRepository;
use App\Packages\Admin\Post\Repositories\PostRepository;
use App\Packages\Admin\Post\Services\Implement\ImplementPostCategoryServices;
use App\Packages\Admin\Post\Services\Implement\ImplementPostServices;
use App\Packages\Admin\Post\Services\PostCategoryServices;
use App\Packages\Admin\Post\Services\PostServices;
use App\Packages\Admin\Product\Repositories\Eloquent\EloquentGuestInfoRepository;
use App\Packages\Admin\Product\Repositories\GuestInfoRepository;
use App\Packages\Admin\Product\Repositories\ShoppingCartRepository;
use App\Packages\Admin\Product\Repositories\Eloquent\EloquentShoppingCartRepository;
use App\Packages\Admin\Product\Repositories\Eloquent\EloquentMediaProductRepository;
use App\Packages\Admin\Product\Repositories\Eloquent\EloquentProductCategoryRepository;
use App\Packages\Admin\Product\Repositories\Eloquent\EloquentProductRepository;
use App\Packages\Admin\Product\Repositories\MediaProductRepositoroy;
use App\Packages\Admin\Product\Repositories\ProductCategoryRepository;
use App\Packages\Admin\Product\Repositories\ProductRepository;
use App\Packages\Admin\Product\Services\GuestInfoServices;
use App\Packages\Admin\Product\Services\Implement\ImplementGuestInfoServices;
use App\Packages\Admin\Product\Services\ShoppingCartServices;
use App\Packages\Admin\Product\Services\Implement\ImplementShoppingCartServices;
use App\Packages\Admin\Product\Services\Implement\ImplementProductCategoryServices;
use App\Packages\Admin\Product\Services\Implement\ImplementProductServices;
use App\Packages\Admin\Product\Services\ProductCategoryServices;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\Shop\Repositories\AddressBookRepository;
use App\Packages\Shop\Repositories\Eloquent\EloquentAddressBookRepository;
use App\Packages\Shop\Repositories\Eloquent\EloquentInvoiceOrderRepository;
use App\Packages\Shop\Repositories\Eloquent\EloquentProductsInOrderRepository;
use App\Packages\Shop\Repositories\InvoiceOrderRepository;
use App\Packages\Shop\Repositories\ProductsInOrderRepository;
use App\Packages\Shop\Services\AddressBookServices;
use App\Packages\Shop\Services\Implement\ImplementAddressBookServices;
use App\Packages\Shop\Services\Implement\ImplementInvoiceOrderServices;
use App\Packages\Shop\Services\Implement\ImplementProductsInOrderServices;
use App\Packages\Shop\Services\InvoiceOrderServices;
use App\Packages\Shop\Services\ProductsInOrderServices;
use App\Packages\SystemGeneral\Repositories\AddressGeneralInfoRepository;
use App\Packages\SystemGeneral\Repositories\CoreDBRepository;
use App\Packages\SystemGeneral\Repositories\Eloquent\EloquentAddressGeneralInfoRepository;
use App\Packages\SystemGeneral\Repositories\Eloquent\EloquentCoreDBRepository;
use App\Packages\SystemGeneral\Repositories\Eloquent\EloquentReferenceRepository;
use App\Packages\SystemGeneral\Repositories\ReferenceRepository;
use App\Packages\SystemGeneral\Services\AddressGeneralInfoService;
use App\Packages\SystemGeneral\Services\HelperServices;
use App\Packages\SystemGeneral\Services\Implement\ImplementAddressGeneralInfoService;
use App\Packages\SystemGeneral\Services\Implement\ImplementHelperServices;
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
        $this->publishes([
            base_path('App/Packages/SystemGeneral/Data') => storage_path('app/public')
        ], 'storage');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind Helper Services:
        $this->app->singleton(HelperServices::class, ImplementHelperServices::class);

        // Bind Media Services:
        $this->app->singleton(MediaServices::class, ImplementMediaServices::class);

        // Bind Core DB:
        $this->app->singleton(CoreDBRepository::class, EloquentCoreDBRepository::class);
        $this->app->singleton(ReferenceRepository::class, EloquentReferenceRepository::class);

        // Bind Address General:
        $this->app->singleton(AddressGeneralInfoService::class, ImplementAddressGeneralInfoService::class);
        $this->app->singleton(AddressGeneralInfoRepository::class, EloquentAddressGeneralInfoRepository::class);

        // Bind Address Shop:
        $this->app->singleton(AddressBookServices::class, ImplementAddressBookServices::class);
        $this->app->singleton(AddressBookRepository::class, EloquentAddressBookRepository::class);

        // Bind Order Shop:
        $this->app->singleton(InvoiceOrderServices::class, ImplementInvoiceOrderServices::class);
        $this->app->singleton(InvoiceOrderRepository::class, EloquentInvoiceOrderRepository::class);
        $this->app->singleton(ProductsInOrderServices::class, ImplementProductsInOrderServices::class);
        $this->app->singleton(ProductsInOrderRepository::class, EloquentProductsInOrderRepository::class);

        // Bind Product:
        $this->app->singleton(ProductServices::class, ImplementProductServices::class);
        $this->app->singleton(ProductRepository::class, EloquentProductRepository::class);

        $this->app->singleton(ShoppingCartServices::class, ImplementShoppingCartServices::class);
        $this->app->singleton(ShoppingCartRepository::class, EloquentShoppingCartRepository::class);

        $this->app->singleton(ProductCategoryServices::class, ImplementProductCategoryServices::class);
        $this->app->singleton(ProductCategoryRepository::class, EloquentProductCategoryRepository::class);

        $this->app->singleton(GuestInfoServices::class, ImplementGuestInfoServices::class);
        $this->app->singleton(GuestInfoRepository::class, EloquentGuestInfoRepository::class);

        // Bind Post:
        $this->app->singleton(PostServices::class, ImplementPostServices::class);
        $this->app->singleton(PostRepository::class, EloquentPostRepository::class);

        $this->app->singleton(PostCategoryServices::class, ImplementPostCategoryServices::class);
        $this->app->singleton(PostCategoryRepository::class, EloquentPostCategoryRepository::class);

        // Bind Media Product:
        $this->app->singleton(MediaProductRepositoroy::class, EloquentMediaProductRepository::class);
    }
}
