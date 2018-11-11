<?php

namespace App\Http\Controllers\SystemGeneral\Web;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $domain = [
            'subDomain' => Route::current()->parameter('subDomain'),
            'mainDomain' => Route::current()->parameter('mainDomain')
        ];
        View::share("domain", $domain);
    }
}
