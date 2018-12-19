<?php
/**
 * Created by PhpStorm.
 * User: BiWin
 * Date: 19/12/2018
 * Time: 11:55 PM
 */
namespace App\Packages\Admin\Post\Repositories\Eloquent;

use App\Packages\Admin\Post\Entities\Post;
use App\Packages\Admin\Post\Entities\PostCategoryRelation;
use App\Packages\Admin\Post\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class EloquentPostRepository implements PostRepository {

    private $model;
    private $postCategoryRelation;
    public function __construct(Post $postEntity, PostCategoryRelation $postCategoryRelation)
    {
        $this->model = $postEntity;
        $this->postCategoryRelation = $postCategoryRelation;
    }

    /**
     * @return mixed
     */
    public function getAllPosts()
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
    public function createPost($data) {
        try {
            return $this->model->create($data);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $postId
     * @return mixed
     */
    public function getDetailPost($postId) {
        try {
            return $this->model->select('*')
                ->where('id', $postId)
                ->first();
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $postId
     * @param $data
     * @return mixed
     */
    public function updatePost($postId, $data) {
        try {
            return $this->model->where('id',$postId)->update($data);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }
}