<?php

/**
 * Created by PhpStorm.
 * User: minh.truong
 * Date: 3/23/18
 * Time: 2:15 PM
 */
namespace Packages\Core\Custom\Middleware;
use \Illuminate\Http\Request;
class WebMiddleware {

    public function handle (Request $request, \Closure $next){
        // Handle your web, it will be executed after middleware group "web"
    }
}