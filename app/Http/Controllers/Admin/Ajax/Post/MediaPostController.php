<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 12/22/18
 * Time: 16:55
 */
namespace App\Http\Controllers\Admin\Ajax\Post;

use App\Packages\Admin\Post\Constants\MediaPostConfig;
use App\Packages\SystemGeneral\Services\MediaServices;
use Illuminate\Http\Request;
use App\Core\Controllers\CoreAjaxController;

class MediaPostController extends CoreAjaxController
{
    protected $mediaServices;
    public function __construct(MediaServices $mediaServices) {
        $this->mediaServices = $mediaServices;
    }

    /**
     * Upload new file and store it
     * @param  Request $request Request with form data: filename and file info
     * @return mixed (info media)
     */
    public function uploadImageFeaturePost(Request $request)
    {
        $file = $request->file('image_feature')[0];
        $fileInfo = $this->mediaServices->storeMedia($file, MediaPostConfig::PATH_STORAGE);
        return response()->json(array('file' => $fileInfo));
    }

    /**
     * Upload new file and store it
     * @param  Request $request Request with form data: filename and file info
     * @return mixed (info media)
     */
    public function uploadImageGalleryPost(Request $request)
    {
        $file = $request->file('gallery_images')[0];
        $fileInfo = $this->mediaServices->storeMedia($file, MediaPostConfig::PATH_STORAGE);
        return response()->json(array('file' => $fileInfo));
    }

    /**
     * Upload new file and store it
     * @param  Request $request Request with form data: filename and file info
     * @return mixed (info media)
     */
    public function uploadImageSecondaryPost(Request $request)
    {
        $file = $request->file('image_secondary')[0];
        $fileInfo = $this->mediaServices->storeMedia($file, MediaPostConfig::PATH_STORAGE);
        return response()->json(array('file' => $fileInfo));
    }

    /**
     * Upload new file and store it
     * @param  Request $request Request with form data: filename and file info
     * @return mixed (info media)
     */
    public function uploadImageSlidePost(Request $request)
    {
        $file = $request->file('image_slide')[0];
        $fileInfo = $this->mediaServices->storeMedia($file, MediaPostConfig::PATH_STORAGE);
        return response()->json(array('file' => $fileInfo));
    }

    /**
     * Upload new file and store it
     * @param  Request $request Request with form data: filename and file info
     * @return mixed (info media)
     */
    public function uploadMediaFeaturePost(Request $request)
    {
        $file = $request->file('media_feature')[0];
        $fileInfo = $this->mediaServices->storeMedia($file, MediaPostConfig::PATH_STORAGE);
        return response()->json(array('file' => $fileInfo));
    }
}