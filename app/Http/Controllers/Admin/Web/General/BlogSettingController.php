<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 21:53
 */

namespace App\Http\Controllers\Admin\Web\General;


use App\Http\Controllers\SystemGeneral\Web\BaseAdminController;

class BlogSettingController extends BaseAdminController
{
    public function __construct() {
        parent::__construct();
    }

    public function blogSettings() {
        return view(config('setting.theme.system') . '.pages.settings.blog-settings');
    }
}