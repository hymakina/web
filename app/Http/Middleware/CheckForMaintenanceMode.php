<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Original;
use Closure;

class CheckForMaintenanceMode extends Original
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        "logout*",
        "login*",
        "admin*"
    ];

    public function handle($request, Closure $next)
    {

        $auth = auth()->guard('admin');
        if ($auth->check()) {
            return $next($request);
        }
        return parent::handle($request, $next);

    }
}
