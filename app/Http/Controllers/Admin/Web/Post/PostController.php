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
use Illuminate\Http\Request;
use App\Http\Controllers\SystemGeneral\Web\Controller;

class PostController extends Controller
{
    //if you have a constructor in other controllers you need call constructor of parent controller (i.e. BaseController) like so:
    protected $postServices;
    protected $postCategoryServices;
    public function __construct(PostServices $postServices, PostCategoryServices $postCategoryServices) {
        parent::__construct();
        $this->postServices = $postServices;
        $this->postCategoryServices = $postCategoryServices;
    }

    /**
     * List Posts.
     *
     * @return
     */
    public function indexPost() {
        $categories = $this->postCategoryServices->getAllPostCategory();
        $posts = $this->postServices->getAllPosts();
        return view(config('setting.theme.system') . '.pages.posts.manage-posts', compact('posts' ,'categories'));
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
