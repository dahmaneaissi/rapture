<?php

namespace App\Http\Middleware\Access;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next )
    {
        $permission = $request->route()->getName();

        if (!app('Illuminate\Contracts\Auth\Guard')->guest())
        {
            $idSperAdmin = config('access.super-administrator.slug');
            if (  $request->user()->hasPermission($permission))
            {
                return $next($request);
            }
        }

        return $request->ajax ? response('Unauthorized.', 401) : abort('403');
    }
}
