<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 21:54
 */

namespace App\Http\Controllers\Admin\Web\General;


use App\Http\Controllers\SystemGeneral\Web\BaseAdminController;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;

class GeneralSettingController extends BaseAdminController
{
    /**
     * BlogSettingController constructor.
     * @param GeneralSettingServices $generalSettingServices
     */
    public function __construct(GeneralSettingServices $generalSettingServices) {
        parent::__construct($generalSettingServices);
    }

    public function index() {
        return view('backend.modern-admin.pages.dashboard');
    }
}