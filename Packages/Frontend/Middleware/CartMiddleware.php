<?php
namespace Packages\Frontend\Middleware;
use Closure;
use Packages\Frontend\Custom\Services\CartServices;

class CartMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $cartServices = app()->make(CartServices::class);
        if($cartServices->count() == 0){
            return redirect('/');
        }
        return $next($request);
    }
}