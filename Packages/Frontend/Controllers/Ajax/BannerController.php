<?php

namespace Packages\Frontend\Controllers\Ajax;
use Illuminate\Routing\Controller;
use Packages\Core\Controllers\CoreAjaxController;
use Packages\Frontend\Custom\Services\BannerServices;
use Packages\Frontend\Custom\Services\FrontendServices;
use Packages\Frontend\Requests\BannerCreateRequest;
use Packages\Frontend\Requests\BannerDeleteRequest;
use Packages\Frontend\Requests\BannerUpdateRequest;
use Packages\Product\Custom\Services\ProductServices;

class BannerController extends CoreAjaxController
{

    /**
     * Instance of EloquentBannerServices
     * @var BannerServices
     */
    private $bannerServices;

    public function __construct(BannerServices $bannerServices)
    {
        $this->bannerServices = $bannerServices;
    }

    /**
     * Create Banner
     * @param BannerCreateRequest $bannerCreateRequest
     * @return JSON
     */
    public function create(BannerCreateRequest $bannerCreateRequest){
        $created = $this->bannerServices->crud($bannerCreateRequest->all());
        return $this->response($created);
    }

    /**
     * Update Banner
     * @param BannerUpdateRequest $bannerUpdateRequest
     * @param int $id
     * @return JSON
     */
    public function update(BannerUpdateRequest $bannerUpdateRequest, $id){
        $updated = $this->bannerServices->crud($bannerUpdateRequest->all(), $id);
        return $this->response($updated);
    }

    public function delete(BannerDeleteRequest $bannerDeleteRequest){
        $deleted = $this->bannerServices->delete($bannerDeleteRequest->all()['id']);
        return $this->response($deleted);
    }
}