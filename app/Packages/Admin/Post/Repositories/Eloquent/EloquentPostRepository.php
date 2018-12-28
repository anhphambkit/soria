<?php
/**
 * Created by PhpStorm.
 * User: BiWin
 * Date: 19/12/2018
 * Time: 11:55 PM
 */
namespace App\Packages\Admin\Post\Repositories\Eloquent;

use App\Packages\Admin\Post\Constants\MediaPostConfig;
use App\Packages\Admin\Post\Constants\PostCategoryConfig;
use App\Packages\Admin\Post\Entities\Post;
use App\Packages\Admin\Post\Entities\PostCategoryRelation;
use App\Packages\Admin\Post\Repositories\PostRepository;
use App\Packages\SystemGeneral\Constants\MediaConfig;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use App\Packages\SystemGeneral\Constants\UsersConfig;
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
            return $this->model->select('posts.*', 'users.username as author', 'users.avatar_link', 'reference.value as type_post',
                                        DB::raw('array_to_json(array_remove(array_agg(DISTINCT category.*), null)) as categories,
                                        array_to_json(array_remove(array_agg(DISTINCT media_tbl.*), null)) as medias')
                )
                ->leftJoin(PostCategoryConfig::CATEGORY_POST_RELATION_TBL . ' as relation', 'relation.post_id', '=', 'posts.id')
                ->leftJoin(PostCategoryConfig::POST_CATEGORY_TBL . ' as category', 'category.id', '=', 'relation.cate_id')
                ->leftJoin(MediaPostConfig::GALLERY_POST_TBL . ' as gallery_images_tbl', 'posts.id', '=', 'gallery_images_tbl.post_id')
                ->leftJoin(MediaConfig::MEDIA_TBL . ' as media_tbl', 'media_tbl.id', '=', 'gallery_images_tbl.media_id')
                ->leftJoin(UsersConfig::USERS_TBL . ' as users', 'users.id', '=', 'posts.created_by')
                ->leftJoin(ReferencesConfig::REFERENCE_TBL . ' as reference', 'reference.id', '=', 'posts.type_article')
                ->groupBy('posts.id', 'users.username', 'users.avatar_link', 'reference.value')
                ->where('posts.id', $postId)
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

    /**
     * @param int|null $categoryId | if categoryId null, get all posts
     * @param boolean $isHomepage | default false
     * @return mixed
     */
    public function getAllPostsByCategory(int $categoryId = null, bool $isHomepage = false) {
        $query = $this->model
                        ->select('posts.id', 'posts.name', 'posts.slug', 'posts.desc', 'posts.rating', 'posts.view', 'posts.type_article',
                            'posts.created_at', 'posts.updated_at', 'reference.value as type_post', 'users.username as author', 'users.avatar_link',
                            DB::raw('array_to_json(array_remove(array_agg(DISTINCT category.*), null)) as categories,
                                array_to_json(array_remove(array_agg(DISTINCT media_tbl.*), null)) as medias')
                        )
                        ->leftJoin(PostCategoryConfig::CATEGORY_POST_RELATION_TBL . ' as relation', 'relation.post_id', '=', 'posts.id')
                        ->leftJoin(PostCategoryConfig::POST_CATEGORY_TBL . ' as category', 'category.id', '=', 'relation.cate_id')
                        ->leftJoin(ReferencesConfig::REFERENCE_TBL . ' as reference', 'reference.id', '=', 'posts.type_article')
                        ->leftJoin(MediaPostConfig::GALLERY_POST_TBL . ' as gallery_images_tbl', 'posts.id', '=', 'gallery_images_tbl.post_id')
                        ->leftJoin(MediaConfig::MEDIA_TBL . ' as media_tbl', 'media_tbl.id', '=', 'gallery_images_tbl.media_id')
                        ->leftJoin(UsersConfig::USERS_TBL . ' as users', 'users.id', '=', 'posts.created_by')
                        ->groupBy('posts.id', 'reference.value', 'users.username', 'users.avatar_link')
                        ->where('posts.is_publish', '=', true);

        if ($isHomepage)
            $query = $query->where('posts.at_homepage', '=', true);

        if ($categoryId)
            $query = $query->leftJoin(PostCategoryConfig::CATEGORY_POST_RELATION_TBL . ' as relation', 'relation.post_id', '=', 'posts.id')
                            ->where('relation.cate_id', '=', $categoryId);

        return $query->orderBy('created_at', 'desc')->get();
    }
}