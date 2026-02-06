<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next, $roles)
  {
    $roles = explode("|", $roles);

    if(!in_array(myRole(), $roles)){
      return redirect(route('error401'));
    }

    return $next($request);
  }
}
