<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/4/18
 * Time: 13:17
 */

namespace App\Http\Controllers\Admin\Web\Post;

use App\Packages\Admin\Post\Services\Implement\ImplementPostCategoryServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCategoryController extends Controller
{
    //if you have a constructor in other controllers you need call constructor of parent controller (i.e. BaseController) like so:
    protected $postCategoryServices;
    public function __construct(ImplementPostCategoryServices $postCategoryServices) {
        parent::__construct();
        $this->postCategoryServices = $postCategoryServices;
    }

    /**
     * List Posts.
     *
     * @return
     */
    public function indexPost() {

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

    /**
     * List Post Categories.
     *
     * @return
     */
    public function indexCategoryPost() {
        $categories = $this->postCategoryServices->getAllPostCategory();
        return view('backend.modern-admin.pages.posts.manage-category-posts', compact('categories'));
    }

    /**
     * New Category Post.
     *
     * @return
     */
    public function newCategoryPost() {
        $categories = $this->postCategoryServices->getAllPostCategory();
        return view('backend.modern-admin.pages.posts.new-category-post', compact('categories'));
    }
}
