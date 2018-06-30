<?php

namespace Packages\General\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\General\Custom\Services\GeneralServices;

class WebController extends Controller
{

    /**
     * Instance of EloquentGeneralService
     * @var GeneralServices
     */
    private $generalServices;

    public function __construct(GeneralServices $generalServices)
    {
        $this->generalServices = $generalServices;
    }

    /**
     * Index of General
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $config = $this->generalServices->get();
        return view('general::index', compact('config'));
    }
}