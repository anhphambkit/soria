<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/28/18
 * Time: 10:43
 */

namespace App\Http\Controllers\Client\Web\Post;


use App\Http\Controllers\SystemGeneral\Web\BaseBlogController;
use App\Packages\Admin\Post\Services\PostCategoryServices;
use App\Packages\Admin\Post\Services\PostServices;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;
use App\Packages\SystemGeneral\Services\HelperServices;

class PostController extends BaseBlogController {

    protected $helperServices;
    protected $postServices;
    protected $postCategoryServices;

    /**
     * PostController constructor.
     * @param HelperServices $helperServices
     * @param PostServices $postServices
     * @param PostCategoryServices $postCategoryServices
     * @param GeneralSettingServices $generalSettingServices
     */
    public function __construct(HelperServices $helperServices, PostServices $postServices,
                                PostCategoryServices $postCategoryServices, GeneralSettingServices $generalSettingServices
    )
    {
        parent::__construct($postCategoryServices, $generalSettingServices, $postServices);
        $this->helperServices = $helperServices;
        $this->postServices = $postServices;
        $this->postCategoryServices = $postCategoryServices;
    }

    /**
     * List Posts.
     *
     * @return
     */
    public function index() {
        $posts = $this->postServices->getAllPostsByCategory(null, true);
        return view(config('setting.theme.blog') . '.pages.homepage', compact('posts'));
    }

    /**
     * @param $urlPost
     * @return mixed
     */
    public function viewDetailPost($urlPost) {
        $postId = $this->helperServices->getIdFromUrl($urlPost);
        if (!$postId) {
            return abort(404);
        }
        $post = $this->postServices->getDetailPost($postId);
        $randomPosts = $this->postServices->getRandomPosts();
        return view(config('setting.theme.blog') . '.pages.posts.single-post', compact('post', 'randomPosts'));
    }

    /**
     * @param $urlCategory
     * @return mixed
     */
    public function viewCategoryPage($urlCategory) {
        $categoryId = $this->helperServices->getIdFromUrl($urlCategory);
        if (!$categoryId) {
            return abort(404);
        }
        $category = $this->postCategoryServices->getDetailPostCategory($categoryId);
        $categoryPosts = $this->postServices->getAllPostsByCategory($categoryId);
//        dd($category);
        return view(config('setting.theme.blog') . '.pages.category', compact('category', 'categoryPosts'));
    }
}