<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/26/19
 * Time: 00:51
 */

namespace App\Packages\SystemGeneral\Repositories\Eloquent;


use App\Packages\SystemGeneral\Entities\GeneralSetting;
use App\Packages\SystemGeneral\Repositories\GeneralSettingRepository;

class EloquentGeneralSettingRepository implements GeneralSettingRepository
{
    private $generalSettingModel;

    /**
     * EloquentGeneralSettingRepository constructor.
     * @param GeneralSetting $generalSettingModel
     */
    public function __construct(GeneralSetting $generalSettingModel)
    {
        $this->generalSettingModel = $generalSettingModel;
    }

    public function getAllSettingsByTypeWeb(string $typeApply = "all")
    {
        try {
            return $this->generalSettingModel
//                        ->select()
                        ->where('apply_for', $typeApply)
                        ->where('is_publish', true)
                        ->get()
                        ->groupBy('main_type');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}