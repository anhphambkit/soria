<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/7/18
 * Time: 03:35
 */

namespace App\Packages\SystemGeneral\Repositories\Eloquent;

use App\Packages\SystemGeneral\Repositories\CoreDBRepository;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class EloquentCoreDBRepository implements CoreDBRepository {

    public function __construct()
    {
    }

    /**
     * @param $table
     * @param $whereConditions
     * @return mixed
     */
    public function getExistRecords($table, $whereConditions) {
        return DB::table($table)->where($whereConditions)->get();
    }

    /**
     * @param $db
     * @param $whereDelete
     * @return mixed
     */
    public function deleteRecordByWhere($db, $whereDelete) {
        DB::beginTransaction();
        try{
            DB::table($db)->where($whereDelete)->delete();
        }catch(\Exception $ex)
        {
            DB::rollback();
        }
        DB::commit();
    }

    /**
     * @param $db
     * @param $where
     * @param $update
     * @return mixed
     */
    public function updateRecordOfTable($db, $where, $update) {
        DB::beginTransaction();
        try{
            DB::table($db)->where($where)->update($update);
        }catch(\Exception $ex)
        {
            DB::rollback();
        }
        DB::commit();
    }

    /**
     * @param $db
     * @param $new
     * @return mixed
     */
    public function createNewRecordOfTable($db, $new) {
        DB::beginTransaction();
        try{
            DB::table($db)->insert($new);
        }catch(\Exception $ex)
        {
            DB::rollback();
        }
        DB::commit();
    }

    /**
     * @param $db
     * @param $whereDelete
     * @param $new
     * @return mixed|void
     */
    public function deleteAndCreateNewRecordOfTable($db, $whereDelete, $new) {
        // Delete records:
        DB::beginTransaction();
        try{
            DB::table($db)->where($whereDelete)->delete();
        }catch(\Exception $ex)
        {
            DB::rollback();
        }
        DB::commit();

        // Create new:
        DB::beginTransaction();
        try{
            DB::table($db)->insert($new);
        }catch(\Exception $ex)
        {
            DB::rollback();
        }
        DB::commit();
    }

    /**
     * @param $db
     * @param $new
     * @return mixed
     */
    public function insertGetIdRecordOfTable($db, $new) {
        DB::beginTransaction();
        try{
            $id = DB::table($db)->insertGetId($new);
        }catch(\Exception $ex)
        {
            DB::rollback();
        }
        DB::commit();
        return $id;
    }

    /**
     * @param $table
     * @param $where
     * @return mixed
     */
    public function getIdRecordOfTable($table, $where) {
        return DB::table($table)->select('id')->where($where)->first()->id;
    }
}