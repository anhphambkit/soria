<?php

namespace Packages\Core\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Packages\Core\Services\CoreRoleServices;
use Packages\Core\Services\CoreServices;
use Packages\Core\Services\Eloquent\EloquentCoreRoleServices;
use Packages\Core\Services\Eloquent\EloquentCoreServices;
use Packages\Core\Services\Eloquent\EloquentUtilServices;
use Packages\Core\Services\UtilServices;

class AppServiceProvider extends ServiceProvider
{
    private $coreServices;
    /**
     * AppServiceProvider constructor.
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        parent::__construct($app);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        if(env('FORCE_HTTPS') && !app()->runningInConsole() && !app()->runningUnitTests()){
            URL::forceScheme('https');
        }
        $this->bindClass();
        $this->mapProviders();
        $this->mapConfigs();
        $this->loadCommands();
        $this->loadTranslation();
        $this->registerValidation();
        $this->registerValidation();
        $this->registerPublish();
    }

    /**
     * Register publish
     */
    protected function registerPublish(){
        $this->publishes([ base_path('Packages/Core/Database/Migrations') => database_path('migrations')], 'core');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CoreServices::class, EloquentCoreServices::class);
        $this->coreServices = $this->app->make(CoreServices::class);
        $this->app->singleton(CoreRoleServices::class, EloquentCoreRoleServices::class);
        $this->app->singleton(UtilServices::class, EloquentUtilServices::class);

        // Bind for Facade
        $this->app->singleton('UtilFacade', EloquentUtilServices::class);
    }

    /**
     * Register all core providers and module providers
     */
    private function mapProviders(){
        $this->app->register(ViewServiceProvider::class);
        $this->app->register('Maatwebsite\Sidebar\SidebarServiceProvider');
        $this->app->register('Packages\\Core\\Providers\\CronjobServiceProvider');

        if(env('APP_BRANCH', 'bos') === 'e-commerce'){
            $this->app->register(\Gloudemans\Shoppingcart\ShoppingcartServiceProvider::class);
        }

        if(env('APP_DEBUG')){
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }

        $packages = $this->coreServices->listPackages();
        foreach($packages as $module){
            $this->app->register('Packages\\'. $module. '\\Custom\\Providers\\PackageServiceProvider');
        }
    }

    /**
     * Register all translation each module
     */
    private function loadTranslation(){
        $packages = $this->coreServices->listPackages();
        foreach($packages as $module){
            $this->loadTranslationsFrom($this->coreServices->packagePath($module).'/Custom/Resources/lang', mb_strtolower($module));
        }
    }

    /**
     * Register all config each module
     */
    private function mapConfigs(){
        $packages = $this->coreServices->listPackages();
        foreach($packages as $module){
            $configPath = $this->coreServices->packagePath($module). '/Custom/Config/'. mb_strtolower($module). '.php';
            if(file_exists($configPath)){
                $this->mergeConfigFrom($configPath, mb_strtolower($module));
            }
        }
    }

    /**
     * Binding default Service and Repository class
     */
    private function bindClass(){
        $packages = $this->coreServices->listPackages(true);
        foreach($packages as $module){
            $packageServicesInterface = 'Packages\\'. ucwords($module). '\\Custom\\Services\\'. ucwords($module). 'Services';
            $packageServicesImplement = 'Packages\\'. ucwords($module). '\\Custom\\Services\\Eloquent\\Eloquent'. ucwords($module). 'Services';
            if(interface_exists($packageServicesInterface) && class_exists($packageServicesImplement)){
                $this->app->singleton($packageServicesInterface, $packageServicesImplement);
            }

            $packageRepositoriesInterface = 'Packages\\'. ucwords($module). '\\Custom\\Repositories\\'. ucwords($module). 'Repositories';
            $packageRepositoriesImplement = 'Packages\\'. ucwords($module). '\\Custom\\Repositories\\Eloquent\\Eloquent'. ucwords($module). 'Repositories';
            if(interface_exists($packageRepositoriesInterface) && class_exists($packageRepositoriesImplement)){
                $this->app->singleton($packageRepositoriesInterface, $packageRepositoriesImplement);
            }
        }
    }

    /**
     * Load all commands each packages
     */
    private function loadCommands(){
        $packages = $this->coreServices->listPackages(false);
        $commands = collect();
        foreach($packages as $package){
            $customClasses = collect(); // it will be like: "Publish", "CleanProject",...
            if(file_exists($dir=base_path('Packages/'.ucwords($package).'/Custom/Commands'))){ // Custom is exist
                $pkgCmd = collect(scandir($dir))->filter(function($file){
                    return  substr($file, -4) === '.php';
                })->map(function($file) use($package, $customClasses) {
                    $customClasses = $customClasses->push(substr($file, 0, -4));
                    return  'Packages\\'.ucwords($package).'\\Custom\\Commands\\'.substr($file, 0, -4);
                });
                $commands = $commands->merge($pkgCmd);
            }

            if (file_exists($dir=base_path('Packages/'.ucwords($package).'/Commands')) ){
                $pkgCmd = collect(scandir($dir))->filter(function($file) use ($package, $customClasses){
                    $withoutExtension = substr($file, 0, -4);
                    $extension = substr($file, -4);
                    return $extension === '.php' && !$customClasses->contains($withoutExtension);
                })->map(function($file) use($package) {
                    return  'Packages\\'.ucwords($package).'\\Commands\\'.substr($file, 0, -4);
                });
                $commands = $commands->merge($pkgCmd);
            }
        }
        $this->commands($commands->toArray());
    }

    /**
     * Register validation hook
     */
    private function registerValidation(){
        Validator::extend('extension', function ($attribute, $value, $parameters, $validator) {

            $fileExt = $value->getClientOriginalExtension();
            if (in_array($fileExt, $parameters))
                return true;
            return false;
        });

        Validator::replacer('extension', function ($message, $attribute, $rule, $parameters) {
            return "The $attribute only support extensions type ".implode(', ',$parameters);
        });
    }

}
