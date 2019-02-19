<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/17/19
 * Time: 16:26
 */

namespace App\Packages\SystemGeneral\Repositories\Eloquent;

use App\Packages\SystemGeneral\Entities\District;
use App\Packages\SystemGeneral\Entities\ProvinceCity;
use App\Packages\SystemGeneral\Entities\Ward;
use App\Packages\SystemGeneral\Repositories\AddressGeneralInfoRepository;

class EloquentAddressGeneralInfoRepository implements AddressGeneralInfoRepository
{
    private $provinceCityModel;
    private $districtModel;
    private $wardModel;
    /**
     * EloquentAddressGeneralInfoRepository constructor.
     */
    public function __construct(ProvinceCity $provinceCityModel, District $districtModel, Ward $wardModel)
    {
        $this->provinceCityModel = $provinceCityModel;
        $this->districtModel = $districtModel;
        $this->wardModel = $wardModel;
    }

    /**
     * @param int $countryId
     * @return mixed
     * @throws \Exception
     */
    public function getProvincesCitiesByCountryId(int $countryId = 0) {
        try {
            return $this->provinceCityModel->select("code as id", "name")
                ->where("country_code", $countryId)
                ->orderBy('order', 'asc')
                ->get();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $cityId
     * @return mixed
     * @throws \Exception
     */
    public function getDistrictsByCityId(int $cityId) {
        try {
            return $this->districtModel->select("code as id", "name as text")
                ->where("city_province_code", $cityId)
                ->get();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $districtId
     * @return mixed
     * @throws \Exception
     */
    public function getWardsByDistrictId(int $districtId) {
        try {
            return $this->wardModel->select("code as id", "name as text")
                ->where("district_code", $districtId)
                ->get();
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}