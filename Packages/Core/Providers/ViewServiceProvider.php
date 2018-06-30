<?php
/**
 * Created by PhpStorm.
 * User: minh.truong
 * Date: 3/27/18
 * Time: 3:29 PM
 */

namespace Packages\Core\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Maatwebsite\Sidebar\SidebarManager;
use Packages\Core\Compose\CoreSidebarCompose;
use Packages\Core\Services\CoreServices;
use Packages\Core\Sidebar\CoreSidebar;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // Map view with module name. Like user::welcome => User/Resources/views/welcome.blade.php
        // Map sidebar each module to sidebar Admin console
        $this->mapViews();
        $this->mapSidebars();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
    }

    /**
     * Mapping view namespace each Package
     */
    private function mapViews(){
        $coreServices = app()->make(CoreServices::class);
        $packages = $coreServices->listPackages();
        foreach($packages as $module){
            $this->loadViewsFrom([$coreServices->packagePath($module). '/Custom/Resources/views', $coreServices->packagePath($module). '/Resources/views'], mb_strtolower($module));
        }
    }

    /**
     * Mapping sidebar each package to sidebar Admin console
     */
    private function mapSidebars(){
        $manager = app()->make(SidebarManager::class);
        $manager->register(CoreSidebar::class);
        View::composer(
            'theme::layouts.sidebar', CoreSidebarCompose::class
        );
    }
}