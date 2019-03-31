<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/2/19
 * Time: 10:50
 */

namespace App\Packages\Shop\Services\Implement;


use App\Packages\Shop\Repositories\MainFeatureRepository;
use App\Packages\Shop\Services\MainFeatureServices;

class ImplementMainFeatureServices implements MainFeatureServices
{
    protected $mainFeatureRepository;

    /**
     * ImplementMainFeatureServices constructor.
     * @param MainFeatureRepository $mainFeatureRepository
     */
    public function __construct(MainFeatureRepository $mainFeatureRepository)
    {
        $this->mainFeatureRepository = $mainFeatureRepository;
    }

    /**
     * @return mixed
     */
    public function getAllMainServices() {
        return $this->mainFeatureRepository->getAllMainServices();
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function getMainServiceByType(string $type) {
        return $this->mainFeatureRepository->getMainServiceByType($type);
    }
}