<?php
namespace Packages\General\Controllers\Ajax;

use Packages\Core\Controllers\CoreAjaxController;
use Packages\General\Custom\Services\GeneralServices;

class AjaxController extends CoreAjaxController
{
    /**
     * @var GeneralServices
     */
    private $generalServices;

    public function __construct(GeneralServices $GeneralServices)
    {
        $this->generalServices = $GeneralServices;
    }

    /**
     */
    public function update(){
        return $this->response($this->generalServices->update(request()->all()));
    }

}