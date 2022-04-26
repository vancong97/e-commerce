<?php

namespace App\Http\Middleware;

use Closure;

class CheckViewUsers
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
        if ($request->user()->can('view-users')) {
            return $next($request);
        }

        return redirect()->route('order.index');
    }
}
