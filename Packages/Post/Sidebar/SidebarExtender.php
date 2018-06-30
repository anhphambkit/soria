<?php

namespace Packages\Post\Sidebar;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender as SidebarExtenderCore;
use Packages\Post\Permissions\Permission;
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
            $group->item(trans('post::post.package'), function (Item $item) {
                $item->icon('icon-docs');

                $item->item(trans('post::post.posts'), function (Item $item){
                    $item->authorize($this->roleServices->hasAccess(Permission::POST_ACCESS));
                    $item->route('post.index');
                    $item->icon(null);
                });

                $item->item(trans('post::post.categories'), function (Item $item){
                    $item->authorize($this->roleServices->hasAccess(Permission::POST_CATEGORY_ACCESS));
                    $item->route('post.category.index');
                    $item->icon(null);
                });
            });
        });
        return $menu;
    }
}