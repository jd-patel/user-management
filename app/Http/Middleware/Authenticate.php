<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
        }
    }

    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->guest())
        {
            if ($request->ajax() || $request->wantsJson())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                if($guard == 'admin')
                {
                    return redirect()->route('admin.login');
                }
                else
                {
                    return redirect()->route('login');
                }
            }
        }
        return $next($request);
    }
}
