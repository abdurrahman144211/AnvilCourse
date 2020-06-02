<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request,  $next, $role = null)
    {
        if (! $request->user()) {
            abort_if($role == 'instructor' || $role == 'administrator', 403);
            return $this->redirectTo($request);
        }

        if ($role == 'administrator') {
            abort_if(! $request->user()->isAdministrator(), 403);
        } elseif ($role == 'instructor') {
            abort_if(! $request->user()->isInstructor(), 403);
        }

        return $next($request);
    }


    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return redirect(route('login'));
        }
    }
}
