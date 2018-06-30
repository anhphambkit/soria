<?php

namespace Packages\Order\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as SidebarExtenderCore;
use Packages\Order\Permissions\Permission;
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
            $group->item(trans('order::order.package'), function (Item $item) {
                $item->icon('icon-handbag');
                $item->authorize($this->roleServices->hasAccess(Permission::ORDER_ACCESS));
                $item->route('order.index');
            });
        });
        return $menu;
    }
}