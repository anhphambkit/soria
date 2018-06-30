<?php

namespace Packages\System\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\System\Custom\Services\SystemServices;

class WebController extends Controller
{

    /**
     * Instance of EloquentSystemService
     * @var SystemServices
     */
    private $systemServices;

    public function __construct(SystemServices $systemServices)
    {
        $this->systemServices = $systemServices;
    }

    /**
     * Index of System
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('system::index');
    }
}