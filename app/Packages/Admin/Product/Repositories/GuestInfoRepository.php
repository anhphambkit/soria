<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/27/19
 * Time: 18:52
 */

namespace App\Packages\Admin\Product\Repositories;

interface GuestInfoRepository {
    /**
     * @param array $data
     * @return mixed
     */
    public function createGuest(array $data);
}