<?php

namespace Packages\Core\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Packages\Core\Services\CoreServices;

class RouteServiceProvider extends ServiceProvider
{
    private $defaultWebRouteFile = 'web.php';
    private $defaultApiRouteFile = 'api.php';
    private $defaultAjaxRouteFile = 'ajax.php';

    private $defaultWebControllerClass = 'Web';
    private $defaultApiControllerClass = 'Api';
    private $defaultAjaxControllerClass = 'Ajax';

    private $defaultWebMiddlewareClass = 'WebMiddleware';
    private $defaultApiMiddlewareClass = 'ApiMiddleware';
    private $defaultAjaxMiddlewareClass = 'AjaxMiddleware';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        // Api route that always use with ACCESS TOKEN or API KEY to access the feature
        // Web route that use in Web UI, always need _nonce or _token for every request
        // Ajax route that use in Web UI, no need _nonce or _token but only use on this domain for every request
        $coreServices = app()->make(CoreServices::class);
        $packages = $coreServices->listPackages();
        foreach($packages as $module){
            $this->mapApiRoutes($module);
            $this->mapAjaxRoutes($module);
            $this->mapWebRoutes($module);
        }
    }

    /**
     * Mapping Web route from each Package
     * @param $moduleName
     */
    protected function mapWebRoutes($moduleName)
    {
        $route = Route::prefix('');
        $this->mapMiddlewareAndNamespace($route, $moduleName, $this->defaultWebMiddlewareClass, $this->defaultWebControllerClass, $this->defaultWebRouteFile);
    }

    /**
     * Mapping API route from each Package
     * API must have KEY to communicate with server, that key will be matched with API_KEY in .env
     *
     * @param $moduleName
     */
    protected function mapApiRoutes($moduleName)
    {
        $route = Route::prefix('api');
        $this->mapMiddlewareAndNamespace($route, $moduleName, $this->defaultApiMiddlewareClass, $this->defaultApiControllerClass, $this->defaultApiRouteFile);
    }

    /**
     * Mapping Ajax route from each Package
     * AJAX must stay in the same domain request without KEY like API
     *
     * @param $moduleName
     */
    private function mapAjaxRoutes($moduleName)
    {
        $route = Route::prefix(config('eden.ajax_prefix_route'));
        $this->mapMiddlewareAndNamespace($route, $moduleName, $this->defaultAjaxMiddlewareClass, $this->defaultAjaxControllerClass, $this->defaultAjaxRouteFile);
    }

    /**
     * Auto mapping all middleware and default controller class to Route
     * @param $route
     * @param $moduleName
     * @param $middlewareClass
     * @param $controllerNamespace
     * @param $defaultRouteFile
     * @throws \Exception when not found middleware or controller
     */
    private function mapMiddlewareAndNamespace(&$route, $moduleName, $middlewareClass, $controllerNamespace, $defaultRouteFile){
        $route->middleware('Packages\\Core\\Custom\\Middleware\\'. $middlewareClass);
        $routeFile = base_path('Packages/'. $moduleName. '/Routes/'. $defaultRouteFile);
        $customRouteFile = base_path('Packages/'. $moduleName. '/Custom/Routes/'. $defaultRouteFile);

        /**
         * Register route with Custom Middleware (which extend from original middleware of package).
         * Middleware is required
         */
        $middleware = 'Packages\\' . $moduleName . '\\Custom\\Middleware\\' . $middlewareClass;
        if(!class_exists($middleware)){
            throw new \Exception('Middleware ['. $middlewareClass. '] is required in '. $middleware);
        }

        // Validate route file
        if(file_exists($routeFile)) {
            $controllerDirectory = 'Packages\\' . $moduleName . '\\Controllers\\' . $controllerNamespace;
        } else {
            throw new \Exception('Not found route '. $routeFile);
        }

        if(file_exists($customRouteFile)) {
            $customControllerDirectory = 'Packages\\' . $moduleName . '\\Custom\\Controllers\\' . $controllerNamespace;
        } else {
            throw new \Exception('Not found custom route '. $customRouteFile);
        }

        // Validate Controller Directory
        if(!is_dir(base_path('Packages/'. $moduleName. '/Controllers/'. $controllerNamespace))) {
            throw new \Exception('Not found controller directory '. $controllerDirectory);
        }

        if(!is_dir(base_path('Packages/'. $moduleName. '/Custom/Controllers/'. $controllerNamespace))) {
            throw new \Exception('Not found custom controller directory '. $customControllerDirectory);
        }

        // Merge middleware
        $middleware = [$middleware];
        if($defaultRouteFile === $this->defaultAjaxRouteFile){
            array_unshift($middleware, 'web', \Packages\Core\Custom\Middleware\AjaxMiddleware::class);
        } elseif($defaultRouteFile === $this->defaultWebRouteFile){
            // Merge group middleware web
            array_unshift($middleware, 'web', \Maatwebsite\Sidebar\Middleware\ResolveSidebars::class);
        } elseif($defaultRouteFile === $this->defaultApiRouteFile){
            array_unshift($middleware, 'api', \Packages\Core\Custom\Middleware\ApiMiddleware::class);
        }

        if(!is_dir( str_replace('\\', '/', base_path($controllerDirectory)) )){
            throw new \Exception("Not found controller directory [". $controllerDirectory ."] in module ". $moduleName);
        }

        $route->middleware($middleware)->namespace($customControllerDirectory)->group($routeFile);
        // $route->middleware($middleware)->namespace($customControllerDirectory)->group($customRouteFile);
    }

}
