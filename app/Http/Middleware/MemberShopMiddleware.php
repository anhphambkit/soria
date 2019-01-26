<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/26/19
 * Time: 10:12
 */

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class MemberShopMiddleware
{
    /**
     * @param $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if (!Auth::check()) return "Not Member";
        $rateId = intval($request->route('rateId'));
        $isAllow = app()->make(MoverSettingCustomRateServices::class)->checkAllowActionOnCustomRate(Auth::id(), $rateId);
        if ($isAllow) return $next($request);
        else {
            if ($request->ajax()) return trans('system::system.middleware_message.not_allow_action_custom_rate');
            return redirect()->to('/');
        }
    }
}
