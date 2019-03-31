<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2019-03-31
 * Time: 10:26
 */

namespace App\Packages\Admin\Product\Services;

interface ShippingFeeServices
{
    /**
     * @param int $orderPrice
     * @param int $cityCode
     * @param int $districtCode
     * @param int $wardCode
     * @param string $countryCode
     * @return mixed
     */
    public function getShippingFee(int $orderPrice, int $cityCode, int $districtCode, int $wardCode, string $countryCode = 'VN');
}