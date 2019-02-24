<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/10/18
 * Time: 16:49
 */

namespace App\Http\Controllers\SystemGeneral\Ajax;

use App\Core\Controllers\CoreAjaxController;
use App\Packages\SystemGeneral\Constants\MediaConfig;
use Illuminate\Http\Request;
use App\Packages\SystemGeneral\Services\MediaServices;

class MediaController extends CoreAjaxController
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
    public function uploadSingleMedia(Request $request)
    {
        $file = $request->file('file');
        $fileInfo = $this->mediaServices->storeMedia($file, MediaConfig::ROOT_STORAGE);
        return response()->json(array('file' => $fileInfo));
    }
}
