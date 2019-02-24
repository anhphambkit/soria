<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/17/19
 * Time: 16:23
 */

namespace App\Packages\SystemGeneral\Services\Implement;


use App\Packages\SystemGeneral\Repositories\AddressGeneralInfoRepository;
use App\Packages\SystemGeneral\Services\AddressGeneralInfoService;

class ImplementAddressGeneralInfoService implements AddressGeneralInfoService
{
    private $addressGeneralInfoRepository;

    /**
     * ImplementAddressGeneralInfoService constructor.
     */
    public function __construct(AddressGeneralInfoRepository $addressGeneralInfoRepository)
    {
        $this->addressGeneralInfoRepository = $addressGeneralInfoRepository;
    }

    /**
     * @param int $countryId
     * @return mixed
     * @throws \Exception
     */
    public function getProvincesCitiesByCountryId(int $countryId = 0) {
        try {
            return $this->addressGeneralInfoRepository->getProvincesCitiesByCountryId($countryId);
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
            return $this->addressGeneralInfoRepository->getDistrictsByCityId($cityId);
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
            return $this->addressGeneralInfoRepository->getWardsByDistrictId($districtId);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}