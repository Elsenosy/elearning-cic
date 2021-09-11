<?php

namespace App\Http\Middleware;

use Closure;

class InstructorAuth
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
        if(!auth('instructor')->check()){
            // session()->flash('error', 'Unauthenticated!');
            return redirect()->to('login')->withError('Unauthenticated!');
        }

        return $next($request);
    }
}
