<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTicket
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( auth()->user()->hasRole('admin') && !in_array( $request->ticket ,auth()->user()->ticket->pluck('id')->toArray())){
            return abort(404);
        }
        return $next($request);

    }
}
