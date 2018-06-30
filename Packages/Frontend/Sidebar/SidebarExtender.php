<?php

namespace Packages\Frontend\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as SidebarExtenderCore;
use Packages\Frontend\Permissions\Permission;
use Packages\User\Custom\Services\RoleServices;

class SidebarExtender implements SidebarExtenderCore {

    /**
     * @var RoleServices
     */
    private $roleServices;

    public function __construct(){
        $this->roleServices = app()->make(RoleServices::class);
    }

    /**
     * Attach menu item to Admin console sidebar
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu) {
        $menu->group('Setting', function (Group $group) {
            $group->hideHeading(true);
            $group->item(trans('frontend::frontend.package'), function (Item $item) {
                $item->icon('fi-layout');

                $item->item(trans('frontend::frontend.banner'), function (Item $item){
                    $item->authorize($this->roleServices->hasAccess(Permission::FRONTEND_BANNER_ACCESS));
                    $item->route('frontend.banner.index');
                    $item->icon(null);
                });
            });
        });
        return $menu;
    }
}