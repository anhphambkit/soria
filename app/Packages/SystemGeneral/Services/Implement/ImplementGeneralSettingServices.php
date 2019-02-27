<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/26/19
 * Time: 00:50
 */

namespace App\Packages\SystemGeneral\Services\Implement;


use App\Packages\SystemGeneral\Repositories\GeneralSettingRepository;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;

class ImplementGeneralSettingServices implements GeneralSettingServices
{
    private $generalSettingRepository;

    /**
     * ImplementGeneralSettingServices constructor.
     * @param GeneralSettingRepository $generalSettingRepository
     */
    public function __construct(GeneralSettingRepository $generalSettingRepository)
    {
        $this->generalSettingRepository = $generalSettingRepository;
    }

    /**
     * @param string $typeApply
     * @return mixed
     * @throws \Exception
     */
    public function getAllSettingsByTypeWeb(string $typeApply = "all") {
        try {
            return $this->generalSettingRepository->getAllSettingsByTypeWeb($typeApply);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param string $typeApply
     * @return mixed
     * @throws \Exception
     */
    public function getAllSettingsForRenderByTypeWeb(string $typeApply = "all") {
        try {
            return $this->generalSettingRepository->getAllSettingsForRenderByTypeWeb($typeApply);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}