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
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            $response = [
                'success' => false,
                'message' => "No esta autorizado",
            ];
            $code = 404;
            return response()->json($response, $code);
        }
        
        return $next($request);
    }
}
