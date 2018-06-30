<?php
namespace Packages\Frontend\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\Post\Custom\Services\PostServices;

class PostController extends Controller
{

    /**
     * Instance of EloquentPostServices
     * @var PostServices
     */
    private $postServices;

    public function __construct(PostServices $postServices)
    {
        $this->postServices = $postServices;
    }

    /**
     * Index of Config Post of Frontend
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($slug){
        $post = $this->postServices->filter(['slug' => $slug])->first();
        return view('frontend.custom::blog', compact('post'));
    }
}