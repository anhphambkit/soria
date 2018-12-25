<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:35
 */

namespace App\Packages\SystemGeneral\Repositories;

interface CoreDBRepository {
    /**
     * @param $table
     * @param $whereConditions
     * @return mixed
     */
    public function getExistRecords($table, $whereConditions);

    /**
     * @param $db
     * @param $whereDelete
     * @return mixed
     */
    public function deleteRecordByWhere($db, $whereDelete);

    /**
     * @param $db
     * @param $where
     * @param $update
     * @return mixed
     */
    public function updateRecordOfTable($db, $where, $update);

    /**
     * @param $db
     * @param $new
     * @return mixed
     */
    public function createNewRecordOfTable($db, $new);

    /**
     * @param $db
     * @param $whereDelete
     * @param $new
     * @return mixed
     */
    public function deleteAndCreateNewRecordOfTable($db, $whereDelete, $new);

    /**
     * @param $db
     * @param $new
     * @return mixed
     */
    public function insertGetIdRecordOfTable($db, $new);

    /**
     * @param $table
     * @param $where
     * @return mixed
     */
    public function getIdRecordOfTable($table, $where);
}