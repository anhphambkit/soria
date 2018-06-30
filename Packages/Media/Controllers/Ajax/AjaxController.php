<?php
namespace Packages\Media\Controllers\Ajax;

use Illuminate\Http\Request;
use Packages\Core\Controllers\CoreAjaxController;
use Packages\Media\Requests\FileDeleteRequest;
use Packages\Media\Requests\FileUploadRequest;
use Packages\Media\Custom\Services\MediaServices;

class AjaxController extends CoreAjaxController
{
    /**
     * @var MediaServices
     */
    private $mediaServices;

    public function __construct(MediaServices $mediaServices)
    {
        $this->mediaServices = $mediaServices;
    }

    /**
     * Upload new file to server
     * @param FileUploadRequest $request
     */
    public function upload(FileUploadRequest $request){
        $this->mediaServices->upload($request);
    }

    /**
     * Delete file
     * @param FileDeleteRequest $request
     * @return boolean
     */
    public function delete(FileDeleteRequest $request){
        return $this->response($this->mediaServices->delete($request['id']));
    }

}