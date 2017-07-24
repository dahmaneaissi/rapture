<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminAuthMiddleware {


    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
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
        if ( $this->auth->guest() )
        {
            if ( Config::get('ip.enable') && !in_array( $request->getClientIp() ,  Config::get('ip.valid') )
            ){
                abort('404');
            }

            return redirect()->guest('auth/login');
        }

        if ( $this->auth->User()->role !== 'administrator' )
        {
            return redirect()->guest('frontend');
        }

        return $next($request);
    }

}
