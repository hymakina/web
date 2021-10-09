<?php
namespace App\Http\Middleware;
use Closure;
use Auth;

class AdminLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::guard('admin')->check()){
            $locale = Auth::guard('admin')->user()->locale;
            if($locale != ""){
                app()->setLocale($locale);
            }
        }
        return $next($request);

    }
}
