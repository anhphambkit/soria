<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/27/19
 * Time: 18:51
 */

namespace App\Packages\Admin\Product\Services\Implement;

use App\Packages\Admin\Product\Repositories\GuestInfoRepository;
use App\Packages\Admin\Product\Services\GuestInfoServices;
use App\Packages\Admin\Product\Services\ProductServices;
use App\Packages\SystemGeneral\Repositories\CoreDBRepository;

class ImplementGuestInfoServices implements GuestInfoServices {

    private $guestInfoRepository;
    private $coreDBRepository;
    private $productServices;

    /**
     * ImplementGuestInfoServices constructor.
     * @param GuestInfoRepository $guestInfoRepository
     * @param CoreDBRepository $coreDBRepository
     * @param ProductServices $productServices
     */
    public function __construct(GuestInfoRepository $guestInfoRepository, CoreDBRepository $coreDBRepository, ProductServices $productServices)
    {
        $this->guestInfoRepository = $guestInfoRepository;
        $this->coreDBRepository = $coreDBRepository;
        $this->productServices = $productServices;
    }

    /**
     * @param string $ip
     * @param string|null $device
     * @return mixed
     * @throws \Exception
     */
    public function createGuest(string $ip, string $device = null)
    {
        try {
            $newData = [
                'ip' => $ip,
                'device' => $device,
            ];
            return $this->guestInfoRepository->createGuest($newData);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}