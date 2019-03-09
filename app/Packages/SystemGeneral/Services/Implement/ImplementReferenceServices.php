<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/9/19
 * Time: 15:14
 */

namespace App\Packages\SystemGeneral\Services\Implement;


use App\Packages\SystemGeneral\Repositories\ReferenceRepository;
use App\Packages\SystemGeneral\Services\ReferenceServices;

class ImplementReferenceServices implements ReferenceServices
{
    protected $referenceRepository;

    public function __construct(ReferenceRepository $referenceRepository)
    {
        $this->referenceRepository = $referenceRepository;
    }

    /**
     * @param $table
     * @param $where
     * @param bool $isUnique
     * @param string $orderBy
     * @return mixed
     */
    public function getReferenceFromAttribute($table, $where, $isUnique = false, $orderBy = 'id') {
        return $this->referenceRepository->getReferenceFromAttribute($table, $where, $isUnique, $orderBy);
    }

    /**
     * @param string $type
     * @param string|null $value
     * @return mixed
     */
    public function getReferenceFromAttributeType(string $type, string $value = null) {
        return $this->referenceRepository->getReferenceFromAttributeType($type, $value);
    }
}