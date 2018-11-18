<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/11/18
 * Time: 20:05
 */

namespace App\Http\Controllers\Admin\Ajax\Product;

use App\Packages\Admin\Product\Constants\MediaProductConfig;
use App\Packages\SystemGeneral\Services\MediaServices;
use Illuminate\Http\Request;
use App\Core\Controllers\CoreAjaxController;

class MediaProductController extends CoreAjaxController
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
    public function uploadSingleImageFeatureProduct(Request $request)
    {
        $file = $request->file('feature_images')[0];
        $fileInfo = $this->mediaServices->storeMedia($file, MediaProductConfig::PATH_STORAGE);
        return response()->json(array('file' => $fileInfo));
    }

    /**
     * Upload new file and store it
     * @param  Request $request Request with form data: filename and file info
     * @return mixed (info media)
     */
    public function uploadSingleImageGalleryProduct(Request $request)
    {
        $file = $request->file('gallery_images')[0];
        $fileInfo = $this->mediaServices->storeMedia($file, MediaProductConfig::PATH_STORAGE);
        return response()->json(array('file' => $fileInfo));
    }
}