<?php

namespace App\Http\Middleware;

use Closure;

class InstructorGuest
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
        if(auth('instructor')->check()){
            return redirect()->to('instructors');
        }
        return $next($request);
    }
}
