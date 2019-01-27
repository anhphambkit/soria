<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/27/19
 * Time: 18:51
 */

namespace App\Packages\Admin\Product\Services;

interface GuestInfoServices {
    /**
     * @param string $ip
     * @param string|null $device
     * @return mixed
     */
    public function createGuest(string $ip, string $device = null);
}