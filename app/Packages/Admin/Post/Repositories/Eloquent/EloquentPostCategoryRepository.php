<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 13:55
 */

namespace App\Packages\Admin\Post\Repositories\Eloquent;

use App\Packages\Admin\Post\Entities\PostCategory;
use App\Packages\Admin\Post\Entities\PostCategoryRelation;
use App\Packages\Admin\Post\Repositories\PostCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class EloquentPostCategoryRepository implements PostCategoryRepository {

    private $model;
    private $postCategoryRelation;
    public function __construct(PostCategory $postCategory, PostCategoryRelation $postCategoryRelation)
    {
        $this->model = $postCategory;
        $this->postCategoryRelation = $postCategoryRelation;
    }

    /**
     * @return mixed
     */
    public function getAllPostCategory()
    {
        try {
            return $this->model
                ->select('id', 'name', 'slug', 'created_at', 'updated_at')
                ->orderBy('name', 'asc')
                ->get();
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createPostCategory($data) {
        try {
            return $this->model->create($data);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $postCategoryId
     * @return mixed
     */
    public function getDetailPostCategory($postCategoryId) {
        try {
            return $this->model->select('*')
                                ->where('id', $postCategoryId)
                                ->first();
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $postCategoryId
     * @param $data
     * @return mixed
     */
    public function updatePostCategory($postCategoryId, $data) {
        try {
            return $this->model->where('id',$postCategoryId)->update($data);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }
}