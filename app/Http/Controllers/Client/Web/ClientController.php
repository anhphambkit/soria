<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/23/18
 * Time: 11:40
 */
namespace App\Http\Controllers\Client\Web;

use App\Packages\Admin\Post\Services\PostCategoryServices;
use App\Packages\Admin\Post\Services\PostServices;
use App\Packages\SystemGeneral\Constants\ReferencesConfig;
use App\Packages\SystemGeneral\Repositories\ReferenceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\SystemGeneral\Web\Controller;

class ClientController extends Controller
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
    public function index() {
        $posts = $this->postServices->getAllPostsByCategory(null, true);
        return view(config('setting.theme.client') . '.pages.homepage', compact('posts'));
    }
}

