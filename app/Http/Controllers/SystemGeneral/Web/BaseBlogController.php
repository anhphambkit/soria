<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2/24/19
 * Time: 18:44
 */

namespace App\Http\Controllers\SystemGeneral\Web;

use App\Packages\Admin\Post\Services\PostCategoryServices;
use App\Packages\Admin\Post\Services\PostServices;
use App\Packages\SystemGeneral\Constants\SettingConfig;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;


class BaseBlogController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected$postCategoryServices;
    protected$generalSettingServices;
    protected$postServices;

    /**
     * BaseBlogController constructor.
     * @param PostCategoryServices $postCategoryServices
     * @param GeneralSettingServices $generalSettingServices
     * @param PostServices $postServices
     */
    public function __construct(PostCategoryServices $postCategoryServices, GeneralSettingServices $generalSettingServices, PostServices $postServices) {
        $this->postCategoryServices = $postCategoryServices;
        $this->generalSettingServices = $generalSettingServices;
        $this->postServices = $postServices;

        $blogSettings = $this->generalSettingServices->getAllSettingsForRenderByTypeWeb(SettingConfig::BLOG);
        $blogCategories = $this->postCategoryServices->getAllPostCategory();
        $blogNewPosts = $this->postServices->getNewPosts();
        View::share([
            "blogCategories" => $blogCategories,
            "blogSettings" => $blogSettings,
            "blogNewPosts" => $blogNewPosts,
        ]);
    }
}
