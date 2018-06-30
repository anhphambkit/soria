<?php

namespace Packages\Frontend\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\Frontend\Custom\Services\BannerServices;
use Packages\Frontend\Custom\Services\FrontendServices;
use Packages\Product\Custom\Services\ProductServices;

class BannerController extends Controller
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
     * Index of Config Banner of Frontend
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $banners = $this->bannerServices->all();
        return view('frontend::banner.list', compact('banners'));
    }
    /**
     * Create Banner page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('frontend::banner.crud');
    }

    /**
     * Create Banner page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $banner = $this->bannerServices->get($id);
        return view('frontend::banner.crud', compact('banner'));
    }
}