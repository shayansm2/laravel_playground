<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as ServiceRoute;

class CustomRouteAssertion
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $routes = ServiceRoute::getRoutes();

        foreach ($routes as $route) {
            /** @var $route Route */
            if ($route->getAction()['uses'] instanceof Closure) {
                abort(500);
            }
        }

        return $next($request);
    }
}
