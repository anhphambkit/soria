<?php

namespace App\Http\Controllers\SystemGeneral\Web;

use App\Packages\SystemGeneral\Constants\SettingConfig;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class BaseAdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $generalSettingServices;

    public function __construct(GeneralSettingServices $generalSettingServices) {
        $this->generalSettingServices = $generalSettingServices;

        $webSettings = $this->generalSettingServices->getAllSettingsForRenderByTypeWeb(SettingConfig::ALL);

        $domain = [
            'subDomain' => Route::current()->parameter('subDomain'),
            'mainDomain' => Route::current()->parameter('mainDomain')
        ];

        View::share([
            "domain" => $domain,
            "webSettings" => $webSettings
        ]);
    }
}
