<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceHttp
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->secure()) {
            return redirect()->to($request->getSchemeAndHttpHost().$request->getRequestUri(), 301, [], false);
        }

        return $next($request);
    }
}
