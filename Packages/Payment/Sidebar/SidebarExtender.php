<?php

namespace Packages\Payment\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as SidebarExtenderCore;
use Packages\Payment\Permissions\Permission;
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
//        $menu->group('Setting', function (Group $group) {
//            $group->hideHeading(true);
//            $group->item(trans('payment::payment.package'), function (Item $item) {
//                $item->icon('icon-user');
//                $item->authorize($this->roleServices->hasAccess(Permission::PAYMENT_ACCESS));
//                $item->route('payment.index');
//            });
//        });
        return $menu;
    }
}