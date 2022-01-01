<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
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
        if (!$request->hasHeader('Authorization')) {
            abort(401, 'Unauthorized');
        }

        if ( $request->bearerToken() == config('services.payment.token') ) {
            return $next($request);
        }

        return abort(403);
    }
}
