<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware
{
    protected $auth;

        public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect('/auth/login');
                // return response('Unauthorized.', 401);
                // return abort(401, 'Unauthorized.');
            }
        }

        if (auth()->check() &&  Auth::user()->hasRole('bagian')) 
        {
            
            return $next($request);

        }
        return abort(401, 'Unauthorized.');
    }
}
