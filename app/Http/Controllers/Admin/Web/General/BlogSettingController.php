<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 21:53
 */

namespace App\Http\Controllers\Admin\Web\General;


use App\Http\Controllers\SystemGeneral\Web\BaseAdminController;
use App\Packages\SystemGeneral\Constants\SettingConfig;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;

class BlogSettingController extends BaseAdminController
{
    protected$generalSettingServices;

    /**
     * BlogSettingController constructor.
     * @param GeneralSettingServices $generalSettingServices
     */
    public function __construct(GeneralSettingServices $generalSettingServices) {
        parent::__construct();
        $this->generalSettingServices = $generalSettingServices;
    }

    public function blogSettings() {
        $blogSettings = $this->generalSettingServices->getAllSettingsByTypeWeb(SettingConfig::BLOG);
//        dd($blogSettings);
        return view(config('setting.theme.system') . '.pages.settings.blog-settings', compact('blogSettings'));
    }
}