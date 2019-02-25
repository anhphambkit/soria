<?php
/**
 * Created by PhpStorm.
 * User: BiWin
 * Date: 19/12/2018
 * Time: 10:16 PM
 */
namespace App\Http\Controllers\Admin\Web\Post;

use App\Packages\Admin\Post\Services\PostCategoryServices;
use App\Packages\Admin\Post\Services\PostServices;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use App\Packages\SystemGeneral\Repositories\ReferenceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\SystemGeneral\Web\BaseAdminController;

class PostController extends BaseAdminController
{
    //if you have a constructor in other controllers you need call constructor of parent controller (i.e. BaseController) like so:
    protected $postServices;
    protected $postCategoryServices;
    protected $referenceRepository;
    public function __construct(PostServices $postServices, PostCategoryServices $postCategoryServices, ReferenceRepository $referenceRepository) {
        parent::__construct();
        $this->postServices = $postServices;
        $this->postCategoryServices = $postCategoryServices;
        $this->referenceRepository = $referenceRepository;
    }

    /**
     * List Posts.
     *
     * @return
     */
    public function indexPost() {
        $categories = $this->postCategoryServices->getAllPostCategory();
        $posts = $this->postServices->getAllPosts();
        $wherePostTypes = [
            ['type', '=', ReferencesConfig::POST_TYPE],
        ];
        $postTypes = $this->referenceRepository->getReferenceFromAttribute(ReferencesConfig::REFERENCE_TBL, $wherePostTypes);
        return view(config('setting.theme.system') . '.pages.posts.manage-posts', compact('posts' ,'categories', 'postTypes'));
    }

    /**
     * New Post.
     *
     * @return
     */
    public function newPost() {

    }

    /**
     * Edit Post.
     *
     * @return
     */
    public function editPost() {

    }
}
