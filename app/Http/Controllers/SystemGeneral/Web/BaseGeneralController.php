<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/1/19
 * Time: 21:45
 */

namespace App\Http\Controllers\SystemGeneral\Web;


use App\Packages\SystemGeneral\Constants\SettingConfig;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class BaseGeneralController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected$generalSettingServices;

    /**
     * BaseGeneralController constructor.
     * @param GeneralSettingServices $generalSettingServices
     */
    public function __construct(GeneralSettingServices $generalSettingServices) {
        $this->generalSettingServices = $generalSettingServices;

        $webSettings = $this->generalSettingServices->getAllSettingsForRenderByTypeWeb(SettingConfig::ALL);

        View::share("webSettings", $webSettings);
    }
}