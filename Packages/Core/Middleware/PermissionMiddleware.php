<?php

namespace Packages\Core\Middleware;


use Illuminate\Http\Request;
use Packages\User\Custom\Services\RoleServices;

class PermissionMiddleware
{
    /**
     * Check permissions of current user login
     * @param Request $request
     * @param \Closure $next
     * @param string || array: $permissions
     */
    public function handle(Request $request, \Closure $next, $permissions){
        $permissions = is_array($permissions) ? $permissions : [$permissions];
        if(!auth()->check()){
            abort(403, 'Unauthorized action.');
        }

        $roleServices = app()->make(RoleServices::class);
        foreach($permissions as $p){
            if(!$roleServices->hasAccess($p)){
                abort(403, 'Unauthorized action.');
            }
        }
        return $next($request);
    }
}