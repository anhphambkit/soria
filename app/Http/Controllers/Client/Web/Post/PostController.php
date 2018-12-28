<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/28/18
 * Time: 10:43
 */

namespace App\Http\Controllers\Client\Web\Post;


use App\Http\Controllers\SystemGeneral\Web\Controller;
use App\Packages\Admin\Post\Services\PostServices;
use App\Packages\SystemGeneral\Services\HelperServices;

class PostController extends Controller {

    protected $helperServices;
    protected $postServices;
    public function __construct(HelperServices $helperServices, PostServices $postServices)
    {
        parent::__construct();
        $this->helperServices = $helperServices;
        $this->postServices = $postServices;
    }

    public function viewDetailPost($domain, $titlePost) {
        $postId = $this->helperServices->getIdFromUrl($titlePost);
        if (!$postId) {
            return abort(404);
        }

        $post = $this->postServices->getDetailPost($postId);
//        dd($post);
        return view(config('setting.theme.client') . '.pages.posts.single-post', compact('post'));
    }
}