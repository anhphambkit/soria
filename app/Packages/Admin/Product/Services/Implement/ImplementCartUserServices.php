<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 12:28
 */

namespace App\Packages\Admin\Product\Services\Implement;

use App\Packages\Admin\Product\Repositories\CartUserRepository;
use App\Packages\Admin\Product\Services\CartUserServices;
use App\Packages\SystemGeneral\Repositories\CoreDBRepository;

class ImplementCartUserServices implements CartUserServices {

    private $repository;
    private $coreDBRepository;

    /**
     * ImplementProductCategoryServices constructor.
     * @param CartUserRepository $cartUserRepository
     * @param CoreDBRepository $coreDBRepository
     */
    public function __construct(CartUserRepository $cartUserRepository, CoreDBRepository $coreDBRepository)
    {
        $this->repository = $cartUserRepository;
        $this->coreDBRepository = $coreDBRepository;
    }

    /**
     * @param array $products
     * @param int $userId
     * @return mixed|void
     * @throws \Exception
     */
    public function addProductsToCartOfUser(array $products, int $userId = 0) {
        try {
            foreach ($products as $productId => $quantity) {
                $quantity = intval($quantity) > 0 ? intval($quantity) : 1;
                $this->repository->addToCartOfUser(intval($productId), $quantity, $userId);
            }
            return;
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}