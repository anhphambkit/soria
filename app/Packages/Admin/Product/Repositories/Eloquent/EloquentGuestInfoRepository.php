<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/27/19
 * Time: 18:53
 */

namespace App\Packages\Admin\Product\Repositories\Eloquent;

use App\Packages\Admin\Product\Entities\GuestInfo;
use App\Packages\Admin\Product\Entities\GuestShoppingCart;
use App\Packages\Admin\Product\Entities\ProductCategoryRelation;
use App\Packages\Admin\Product\Repositories\GuestInfoRepository;

class EloquentGuestInfoRepository implements GuestInfoRepository {

    private $guestInfo;
    private $productCategoryRelation;
    public function __construct(GuestInfo $guestInfo,ProductCategoryRelation $productCategoryRelation)
    {
        $this->guestInfo = $guestInfo;
        $this->productCategoryRelation = $productCategoryRelation;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function createGuest(array $data) {
        try {
            return $this->guestInfo->insertGetId($data);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}