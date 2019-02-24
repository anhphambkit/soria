<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers\SystemGeneral';
    protected $namespaceAdmin = 'App\Http\Controllers\Admin';
    protected $namespaceClient = 'App\Http\Controllers\Client';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::pattern('mainDomain', '(www.drlinhlinh.com|drlinhlinh.com)');
        Route::pattern('subDomain', '(admin)');
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAjaxRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespaceClient . "\Web")
             ->group(base_path('routes/web.php'));

        //Register for admin:
        Route::middleware('web')
             ->namespace($this->namespaceAdmin . "\Web")
             ->group(base_path('routes/admin/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace . "\Api")
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "ajax" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAjaxRoutes()
    {
        Route::prefix('ajax-general')
            ->namespace($this->namespace. "\Ajax")
            ->group(base_path('routes/general/ajax.php'));

        Route::prefix('ajax')
             ->namespace($this->namespaceClient. "\Ajax")
             ->group(base_path('routes/ajax.php'));

        //Register for admin:
        Route::prefix('ajax-admin')
            ->namespace($this->namespaceAdmin . "\Ajax")
            ->group(base_path('routes/admin/ajax.php'));
    }
}
