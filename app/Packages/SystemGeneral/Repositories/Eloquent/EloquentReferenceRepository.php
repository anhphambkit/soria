<?php
/**
 * Created by PhpStorm.
 * User: BiWin
 * Date: 22/12/2018
 * Time: 2:36 PM
 */
namespace App\Packages\SystemGeneral\Repositories\Eloquent;

use App\Packages\SystemGeneral\Entities\Reference;
use App\Packages\SystemGeneral\Repositories\ReferenceRepository;
use Illuminate\Support\Facades\DB;

class EloquentReferenceRepository implements ReferenceRepository {

    protected $referenceModel;

    /**
     * EloquentReferenceRepository constructor.
     * @param Reference $referenceModel
     */
    public function __construct(Reference $referenceModel)
    {
        $this->referenceModel = $referenceModel;
    }

    /**
     * @param $table
     * @param $where
     * @param bool $isUnique
     * @param string $orderBy
     * @return mixed
     */
    public function getReferenceFromAttribute($table, $where, $isUnique = false, $orderBy = 'id') {
        $query = DB::table($table)
            ->select('*')
            ->where($where)
            ->where('is_publish', '=', true)
            ->orderBy($orderBy);
        if ($isUnique) return $query->first();
        return $query->get();
    }

    /**
     * @param string $type
     * @param string|null $value
     * @return mixed
     * @throws \Exception
     */
    public function getReferenceFromAttributeType(string $type, string $value = null) {
        try {
            if ($value)
                return $this->referenceModel
                    ->select('*')
                    ->where('type', $type)
                    ->where('value', $value)
                    ->where('is_publish', true)
                    ->first();
            else
                return $this->referenceModel
                    ->select('*')
                    ->where('type', $type)
                    ->where('is_publish', true)
                    ->orderBy('created_at', 'asc')
                    ->get();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}