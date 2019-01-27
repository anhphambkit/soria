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
                ->orderBy('updated_at', 'desc')
//                ->orderBy('name', 'asc')
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
//            $post = $this->model->select('posts.*', 'users.username as author', 'users.avatar_link', 'reference.value as type_post',
//                                        DB::raw('array_to_json(array_remove(array_agg(DISTINCT category.*), null)) as categories,
//                                        array_to_json(array_remove(array_agg(DISTINCT media_tbl.*), null)) as medias')
//                )
//                ->leftJoin(PostCategoryConfig::CATEGORY_POST_RELATION_TBL . ' as relation', 'relation.post_id', '=', 'posts.id')
//                ->leftJoin(PostCategoryConfig::POST_CATEGORY_TBL . ' as category', 'category.id', '=', 'relation.cate_id')
//                ->leftJoin(MediaPostConfig::GALLERY_POST_TBL . ' as gallery_images_tbl', 'posts.id', '=', 'gallery_images_tbl.post_id')
//                ->leftJoin(MediaConfig::MEDIA_TBL . ' as media_tbl', 'media_tbl.id', '=', 'gallery_images_tbl.media_id')
//                ->leftJoin(UsersConfig::USERS_TBL . ' as users', 'users.id', '=', 'posts.created_by')
//                ->leftJoin(ReferencesConfig::REFERENCE_TBL . ' as reference', 'reference.id', '=', 'posts.type_article')
//                ->groupBy('posts.id', 'users.username', 'users.avatar_link', 'reference.value')
//                ->where('posts.id', $postId)
//                ->where('posts.is_publish', true);
//                ->first()
//                ->toArray();
            $sql = "select x.*, users.username as author, users.avatar_link, reference.value as type_post,
                                  array_to_json(array_remove(array_agg(DISTINCT category.*), null)) as categories,
                                  array_to_json(array_remove(array_agg(DISTINCT media_tbl.*), null)) as medias,
                           json_build_object(
                                'id', prev_id,
                                'name', prev_name,
                                'slug', prev_slug,
                                'created_at', prev_created_at
                               ) as prev,
                           json_build_object(
                                'id', next_id,
                                'name', next_name,
                                'slug', next_slug,
                                'created_at', next_created_at
                               ) as next
                    from (
                         select  *,
                                 lag(id) over (order by created_at asc, slug desc, id asc) as prev_id,
                                 lag(name) over (order by created_at asc, slug desc, id asc) as prev_name,
                                 lag(slug) over (order by created_at asc, slug desc, id asc) as prev_slug,
                                 lag(created_at) over (order by created_at asc, slug desc, id asc) as prev_created_at,
                                 lead(id) over (order by created_at asc, slug desc, id asc) as next_id,
                                 lead(name) over (order by created_at asc, slug desc, id asc) as next_name,
                                 lead(slug) over (order by created_at asc, slug desc, id asc) as next_slug,
                                 lead(created_at) over (order by created_at asc, slug desc, id asc) as next_created_at
                    
                         from posts where is_publish = true
                         ) x
                   left join \"post_category_relation\" as \"relation\" on \"relation\".\"post_id\" = \"x\".\"id\"
                   left join \"post_categories\" as \"category\" on \"category\".\"id\" = \"relation\".\"cate_id\"
                   left join \"post_galleries\" as \"gallery_images_tbl\" on \"x\".\"id\" = \"gallery_images_tbl\".\"post_id\"
                   left join \"media__files\" as \"media_tbl\" on \"media_tbl\".\"id\" = \"gallery_images_tbl\".\"media_id\"
                   left join \"users\" as \"users\" on \"users\".\"id\" = \"x\".\"created_by\"
                   left join \"references\" as \"reference\" on \"reference\".\"id\" = \"x\".\"type_article\"
                    where x.id = {$postId}
                    GROUP BY x.id, x.name, x.slug, x.created_at, x.is_publish, x.desc, x.content, x.at_homepage, x.rating, x.view,
                             x.meta_keywords, x.type_article, x.updated_at, x.created_by, x.prev_id, x.prev_name, x.prev_slug,
                             x.prev_created_at, x.next_id, x.next_name, x.next_slug, x.next_created_at, x.meta_title, x.meta_description,
                             users.username, users.avatar_link, reference.value;";

            $result = DB::select($sql);
            return reset($result);
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $postId
     * @return mixed
     */
    public function getDetailPostForAdminUpdate($postId) {
        try {
            return $this->model->select('posts.*', 'users.username as author', 'users.avatar_link', 'reference.value as type_post',
                                        DB::raw('array_to_json(array_remove(array_agg(DISTINCT category.id), null)) as category_id,
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
                ->first()
                ->toArray();
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
        try {
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
                $query = $query->where('relation.cate_id', '=', $categoryId);

            return $query->orderBy('created_at', 'desc')->get();
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $dataGet
     * @param string $attributeGet
     * @return mixed
     */
    public function getNextPrevPost($dataGet, $attributeGet = "created_at") {
        try {
            return $this->model->select('id', 'name', 'slug', 'created_at');
//                                ->where($attributeGet, '');
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }
}