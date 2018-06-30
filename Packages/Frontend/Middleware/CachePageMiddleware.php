<?php
namespace Packages\Frontend\Middleware;
use Closure;
use Illuminate\Support\Facades\Cache;

class CachePageMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $key = $request->fullUrl();  //key for caching/retrieving the response value

        if (Cache::has($key))  //If it's cached...
            return response(Cache::get($key));   //... return the value from cache and we're done.

        $response = $next($request);  //If it wasn't cached, execute the request and grab the response
        Cache::put($key, $response->getContent(), env('SESSION_LIFETIME', 120));  //Cache response
        return $response;
    }
}