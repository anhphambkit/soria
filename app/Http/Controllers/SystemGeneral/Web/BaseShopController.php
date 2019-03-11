<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 18:44
 */

namespace App\Http\Controllers\SystemGeneral\Web;

use App\Packages\Admin\Product\Services\ProductCategoryServices;
use App\Packages\SystemGeneral\Constants\SettingConfig;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

class BaseShopController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $productCategoryServices;
    protected $generalSettingServices;

    /**
     * BaseShopController constructor.
     * @param ProductCategoryServices $categoryServices
     * @param GeneralSettingServices $generalSettingServices
     */
    public function __construct(ProductCategoryServices $categoryServices, GeneralSettingServices $generalSettingServices) {
        $this->productCategoryServices = $categoryServices;
        $this->generalSettingServices = $generalSettingServices;
        $shopSettings = $this->generalSettingServices->getAllSettingsForRenderByTypeWeb(SettingConfig::SHOP);
        $shopCategories = $this->productCategoryServices->getAllProductCategory();

        View::share([
            "shopCategories" => $shopCategories,
            "shopSettings" => $shopSettings,
        ]);
    }
}
