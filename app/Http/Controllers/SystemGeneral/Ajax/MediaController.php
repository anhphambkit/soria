<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/10/18
 * Time: 16:49
 */

namespace App\Http\Controllers\SystemGeneral\Ajax;

use App\Core\Controllers\CoreAjaxController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaController extends CoreAjaxController
{
    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt'];

    public function __construct() {
    }

    /**
     * Upload new file and store it
     * @param  Request $request Request with form data: filename and file info
     * @return boolean True if success, otherwise - false
     */
    public function uploadImage(Request $request)
    {
        $file = $request->file('upload');
        $ext = $file->getClientOriginalExtension();
        $fileNameExt = $file->getClientOriginalName();
        $type = $this->getType($ext);

        $path = Storage::putFileAs('/public/' . $type, $file, $fileNameExt);

        $result = [
            '210' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg/w_210",
            '420' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg/w_420",
            '630' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg/w_630",
            '840' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg/w_840",
            '1050' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg/w_1050",
            '1260' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg/w_1260",
            '1470' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg/w_1470",
            '1680' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg/w_1680",
            '1890' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg/w_1890",
            '2048' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg/w_2048",
            'default' => "https://33333.cdn.cke-cs.com/rc1DFuFpHqcR3Mah6y0e/images/9a0c96cdfd83df2f8c11e486355ccc75219f1bc2128ab85c_IMG_20180930_110919.jpg"
        ];
        return $path;
    }

    /**
     * Get type by extension
     * @param  string $ext Specific extension
     * @return string      Type
     */
    private function getType($ext)
    {
        if (in_array($ext, $this->image_ext)) {
            return 'image';
        }

        if (in_array($ext, $this->audio_ext)) {
            return 'audio';
        }

        if (in_array($ext, $this->video_ext)) {
            return 'video';
        }

        if (in_array($ext, $this->document_ext)) {
            return 'document';
        }
    }

    /**
     * Get all extensions
     * @return array Extensions of all file types
     */
    private function allExtensions()
    {
        return array_merge($this->image_ext, $this->audio_ext, $this->video_ext, $this->document_ext);
    }

    /**
     * Get directory for the specific user
     * @return string Specific user directory
     */
    private function getUserDir()
    {
//        return Auth::user()->name . '_' . Auth::id();
    }
}
