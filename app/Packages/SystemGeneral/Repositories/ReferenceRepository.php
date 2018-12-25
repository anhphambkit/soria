<?php
/**
 * Created by PhpStorm.
 * User: BiWin
 * Date: 22/12/2018
 * Time: 2:35 PM
 */
namespace App\Packages\SystemGeneral\Repositories;

interface ReferenceRepository {
    /**
     * @param $table
     * @param $where
     * @param bool $isUnique
     * @param string $orderBy
     * @return mixed
     */
    public function getReferenceFromAttribute($table, $where, $isUnique = false, $orderBy = 'id');
}