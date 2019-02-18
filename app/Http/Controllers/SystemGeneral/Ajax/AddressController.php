<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/18/19
 * Time: 07:51
 */

namespace App\Http\Controllers\SystemGeneral\Ajax;


use App\Core\Controllers\CoreAjaxController;
use App\Packages\SystemGeneral\Services\AddressGeneralInfoService;
use Illuminate\Http\Request;

class AddressController extends CoreAjaxController
{
    protected $addressGeneralInfoService;

    public function __construct(AddressGeneralInfoService $addressGeneralInfoService) {
        $this->addressGeneralInfoService = $addressGeneralInfoService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistrictsByCity(Request $request) {
        $cityId = (int) $request->get('province_city_code');
        $districts = $this->addressGeneralInfoService->getDistrictsByCityId($cityId);
        return $this->response($districts);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWardsByDistrict(Request $request) {
        $districtId = (int) $request->get('district_code');
        $wards = $this->addressGeneralInfoService->getDistrictsByCityId($districtId);
        return $this->response($wards);
    }
}