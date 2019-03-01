<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/1/19
 * Time: 23:06
 */

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * @param $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if (!Auth::check()) redirect(route('login'));
        $isAdmin = Auth::user()->role_id;
        if ($isAdmin != 1)
            return redirect()->to(route('login'));
        return $next($request);
    }
}
