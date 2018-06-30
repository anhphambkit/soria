<?php

namespace Packages\Media\Controllers\Web;
use Illuminate\Routing\Controller;
use Packages\Media\Custom\Services\MediaServices;

class WebController extends Controller
{

    /**
     * Instance of EloquentMediaService
     * @var MediaServices
     */
    private $mediaServices;

    public function __construct(MediaServices $mediaServices)
    {
        $this->mediaServices = $mediaServices;
    }

    /**
     * Index of Media
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $files = $this->mediaServices->all()->sortByDesc('created_at');
        return view('media::index', compact('files'));
    }

    /**
     * Index of Upload Media popup
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function upload(){
        $files = $this->mediaServices->all()->sortByDesc('created_at');
        return view('media::upload', compact('files'));
    }
}