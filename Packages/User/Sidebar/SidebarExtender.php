<?php

namespace Packages\User\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as SidebarExtenderCore;
use Packages\User\Permissions\Permission;
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
            $group->item(trans('user::user.package'), function (Item $item) {
                $item->icon('icon-user');

                $item->item(trans('user::user.profile'), function (Item $item){
                    $item->authorize($this->roleServices->hasAccess(Permission::USER_VIEW_PROFILE));
                    $item->route('user.profile');
                    $item->icon(null);
                });

                $item->item(trans('user::user.roles'), function (Item $item) {
                    $item->icon(null);
                    $item->authorize($this->roleServices->hasAccess(Permission::ROLE_VIEW_ROLES));
                    $item->route('user.role.index');
                });
            });
        });
        return $menu;
    }
}