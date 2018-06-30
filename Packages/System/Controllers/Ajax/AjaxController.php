<?php
namespace Packages\System\Controllers\Ajax;

use Illuminate\Support\Facades\Cache;
use Packages\Core\Controllers\CoreAjaxController;
use Packages\System\Custom\Services\SystemServices;

class AjaxController extends CoreAjaxController
{
    /**
     * @var SystemServices
     */
    private $systemServices;

    public function __construct(SystemServices $systemServices)
    {
        $this->systemServices = $systemServices;
    }

    public function clearCache(){
        Cache::flush();
        return $this->response([]);
    }

}