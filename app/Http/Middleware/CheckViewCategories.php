<?php

namespace App\Http\Middleware;

use Closure;

class CheckViewCategories
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
        if ($request->user()->can('view-categories')) {
            return $next($request);
        } 
        

        return redirect()->route('order.index');
    }
}
