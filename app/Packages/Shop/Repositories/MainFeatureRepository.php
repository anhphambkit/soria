<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/2/19
 * Time: 10:51
 */

namespace App\Packages\Shop\Repositories;


interface MainFeatureRepository
{
    /**
     * @return mixed
     */
    public function getAllMainServices();
}