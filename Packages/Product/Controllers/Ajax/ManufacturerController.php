<?php
namespace Packages\Product\Controllers\Ajax;

use Packages\Core\Controllers\CoreAjaxController;
use Packages\Product\Custom\Services\CategoryServices;
use Packages\Product\Custom\Services\ManufacturerServices;
use Packages\Product\Custom\Services\ProductServices;
use Packages\Product\Requests\CategoryCreateRequest;
use Packages\Product\Requests\CategoryDeleteRequest;
use Packages\Product\Requests\CategoryUpdateRequest;
use Packages\Product\Requests\ManufacturerCreateRequest;
use Packages\Product\Requests\ManufacturerUpdateRequest;
use Packages\Product\Requests\ProductCreateRequest;
use Packages\Product\Requests\ProductDeleteRequest;
use Packages\Product\Requests\ProductUpdateRequest;

class ManufacturerController extends CoreAjaxController
{
    /**
     * @var ManufacturerServices
     */
    private $manufacturerServices;

    public function __construct(ManufacturerServices $manufacturerServices)
    {
        $this->manufacturerServices = $manufacturerServices;
    }

    /**
     * Create new category
     * @param ManufacturerCreateRequest $manufacturerCreateRequest
     * @return
     */
    public function createManufacturer(ManufacturerCreateRequest $manufacturerCreateRequest){
        return $this->response($this->manufacturerServices->crud($manufacturerCreateRequest->all()));
    }

    /**
     * @param ManufacturerUpdateRequest $manufacturerUpdateRequest
     * @param $id
     * @return
     */
    public function updateManufacturer(ManufacturerUpdateRequest $manufacturerUpdateRequest, $id){
        return $this->response($this->manufacturerServices->crud($manufacturerUpdateRequest->all(), $id));
    }

    /**
     * Delete category
     */
    public function deleteManufacturer(){
        return $this->response($this->manufacturerServices->delete(request()['id']));
    }

    /**
     * Get category
     * @param $id
     * @return string
     */
    public function getManufacturer($id){
        return $this->response($this->manufacturerServices->get($id));
    }
}