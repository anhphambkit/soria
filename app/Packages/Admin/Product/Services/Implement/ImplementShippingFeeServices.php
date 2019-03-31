<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2019-03-31
 * Time: 10:26
 */

namespace App\Packages\Admin\Product\Services\Implement;


use App\Packages\Admin\Product\Services\ShippingFeeServices;

class ImplementShippingFeeServices implements ShippingFeeServices
{
    const HCM_CODE = 79;
    const SHIPPING_FEE = 25000;
    const MINIMUM_ORDER_PRICE_FOR_FREE_SHIPPING = 600000;

    /**
     * @param int $orderPrice
     * @param int $cityCode
     * @param int $districtCode
     * @param int $wardCode
     * @param string $countryCode
     * @return int|mixed
     * @throws \Exception
     */
    public function getShippingFee(int $orderPrice, int $cityCode, int $districtCode, int $wardCode, string $countryCode = 'VN') {
        try {
            if ($cityCode !== self::HCM_CODE && $orderPrice < self::MINIMUM_ORDER_PRICE_FOR_FREE_SHIPPING) {
                return self::SHIPPING_FEE;
            }
            else {
                return 0;
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}