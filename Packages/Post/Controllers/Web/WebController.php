<?php

namespace Packages\Post\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\Post\Custom\Services\CategoryServices;
use Packages\Post\Custom\Services\ManufacturerServices;
use Packages\Post\Custom\Services\PostServices;

class WebController extends Controller
{

    /**
     * Instance of EloquentPostServices
     * @var PostServices
     */
    private $postServices;
    /**
     * Instance of EloquentCategoryServices
     * @var CategoryServices
     */
    private $categoryServices;
    /**
     * Instance of EloquentManufacturerServices
     * @var $manufacturerServices
     */
//    private $manufacturerServices;

    public function __construct(PostServices $postServices, CategoryServices $categoryServices)
    {
        $this->postServices = $postServices;
        $this->categoryServices = $categoryServices;
    }

    /**
     * Index of Post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $posts = $this->postServices->all();
        return view('post::post.list', compact('posts'));
    }

    /**
     * New Post (admin page)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newPost(){
        $cats = $this->categoryServices->all();
        return view('post::post.crud', compact('cats'));
    }

    /**
     * Edit Post (admin page)
     * @param int $id: Post ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPost($id){
        $cats = $this->categoryServices->all();
        $post = $this->postServices->get($id);
        return view('post::post.crud', compact('cats', 'post'));
    }

    /**
     * Index of Categories Posts
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryIndex(){
        $cats = $this->categoryServices->all();
        return view('post::category.index', compact('cats'));
    }
}