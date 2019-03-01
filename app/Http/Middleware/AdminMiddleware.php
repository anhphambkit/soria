<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/1/19
 * Time: 23:06
 */

namespace App\Http\Middleware;

use App\Packages\SystemGeneral\Constants\UsersConfig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $roleAdmin = DB::table('roles')->where('name', UsersConfig::ROOT_LEVEL)->first();
        if (empty($roleAdmin) || $roleAdmin->id != $isAdmin)
            return redirect()->to(route('login'));
        return $next($request);
    }
}
