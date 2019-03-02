<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/2/19
 * Time: 10:51
 */

namespace App\Packages\Shop\Repositories\Eloquent;


use App\Packages\Shop\Entities\MainService;
use App\Packages\Shop\Repositories\MainFeatureRepository;

class EloquentMainFeatureRepository implements MainFeatureRepository
{
    protected $mainServiceModel;

    /**
     * EloquentMainFeatureRepository constructor.
     * @param MainService $mainServiceModel
     */
    public function __construct(MainService $mainServiceModel)
    {
        $this->mainServiceModel = $mainServiceModel;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getAllMainServices() {
        try {
            return $this->mainServiceModel
                        ->select('*')
                        ->orderBy('order', 'asc')
                        ->get();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}