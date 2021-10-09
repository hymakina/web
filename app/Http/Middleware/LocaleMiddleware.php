<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
use Illuminate\Support\Facades\Session;
use Loc;

class LocaleMiddleware
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

        $routePrefix = Loc::getRoutePrefix();
        if(!$routePrefix){

            $locale = Session::get('locale') ? : Loc::getDefaultLocale();

            $uri = \Request::path();
            if($uri == "/"){
                return \Redirect::to(url('/') . '/' . $locale, 301);
            }else{
                return \Redirect::to(url('/') . '/' . $locale . '/' . $uri, 301);
            }


        }

        \Session::put('locale', $routePrefix);
        app()->setLocale($routePrefix);

        // continue request
        return $next($request);
    }

}
