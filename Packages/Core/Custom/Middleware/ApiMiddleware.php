<?php

/**
 * Created by PhpStorm.
 * User: minh.truong
 * Date: 3/23/18
 * Time: 2:15 PM
 */
namespace Packages\Core\Custom\Middleware;
use Illuminate\Http\Request;

class ApiMiddleware extends \Packages\Core\Middleware\ApiMiddleware
{
    public function handle (Request $request, \Closure $next){
        return $next($request);
    }
}