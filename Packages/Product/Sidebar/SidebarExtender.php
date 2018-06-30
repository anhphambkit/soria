<?php

namespace Packages\Product\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as SidebarExtenderCore;
use Packages\Product\Permissions\Permission;
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
            $group->item(trans('product::product.package'), function (Item $item) {
                $item->icon('dripicons-device-tablet');

                $item->item(trans('product::product.products'), function (Item $item){
                    $item->authorize($this->roleServices->hasAccess(Permission::PRODUCT_ACCESS));
                    $item->route('product.index');
                    $item->icon(null);
                });

                $item->item(trans('product::product.categories'), function (Item $item){
                    $item->authorize($this->roleServices->hasAccess(Permission::PRODUCT_CATEGORY_ACCESS));
                    $item->route('product.category.index');
                    $item->icon(null);
                });

                $item->item(trans('product::product.manufacturer'), function (Item $item){
                    $item->authorize($this->roleServices->hasAccess(Permission::PRODUCT_MANUFACTURER_ACCESS));
                    $item->route('product.manufacturer.index');
                    $item->icon(null);
                });


            });
        });
        return $menu;
    }
}