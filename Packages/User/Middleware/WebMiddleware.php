<?php

/**
 * Created by PhpStorm.
 * User: minh.truong
 * Date: 3/23/18
 * Time: 1:45 PM
 */
namespace Packages\User\Middleware;
use Closure;

class WebMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}