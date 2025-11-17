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
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next,...$role)
    {   
        if (!auth()->check()) {
        // if (!auth()->check() || !auth()->user()->hasRole($role)) {
            abort(403, 'Maaf, user tidak di izinkan');
        }

        return $next($request);

        // if(in_array($request->user()->role,$role)){
        //     return $next($request);
        // }

        // abort(403, 'Unauthorized.');
        // return redirect('/dashboard');
    }
}
