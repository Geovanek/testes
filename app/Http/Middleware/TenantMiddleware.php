<?php

namespace App\Http\Middleware;

use App\Tenant\TenantFacade;
use Auth;
use Closure;
use Illuminate\Http\Request;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        // na linha abaixo o método coach é o userTenant usado no curso da School of Net
        $tenantObj = $user->coach->tenant;
        TenantFacade::setTenant($tenantObj);
        return $next($request);
    }
}
