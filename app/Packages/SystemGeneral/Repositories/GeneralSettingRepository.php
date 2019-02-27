<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/26/19
 * Time: 00:50
 */

namespace App\Packages\SystemGeneral\Repositories;


interface GeneralSettingRepository
{
    /**
     * @param string $typeApply
     * @return mixed
     * @throws \Exception
     */
    public function getAllSettingsByTypeWeb(string $typeApply = "all");
}