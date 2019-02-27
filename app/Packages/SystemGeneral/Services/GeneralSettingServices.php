<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/26/19
 * Time: 00:50
 */

namespace App\Packages\SystemGeneral\Services;


interface GeneralSettingServices
{
    /**
     * @param string $typeApply
     * @return mixed
     */
    public function getAllSettingsByTypeWeb(string $typeApply = "all");

    /**
     * @param string $typeApply
     * @return mixed
     */
    public function getAllSettingsForRenderByTypeWeb(string $typeApply = "all");
}