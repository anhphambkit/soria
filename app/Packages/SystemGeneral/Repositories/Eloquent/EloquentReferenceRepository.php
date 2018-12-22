<?php
/**
 * Created by PhpStorm.
 * User: BiWin
 * Date: 22/12/2018
 * Time: 2:36 PM
 */
namespace App\Packages\SystemGeneral\Repositories\Eloquent;

use App\Packages\SystemGeneral\Repositories\ReferenceRepository;
use Illuminate\Support\Facades\DB;

class EloquentReferenceRepository implements ReferenceRepository {

    public function __construct()
    {
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
            ->orderBy($orderBy);
        if ($isUnique) return $query->first();
        return $query->get();
    }
}