<?php

namespace QueraCollege\LaravelHealth\Views;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route as ServiceRoute;

class RoutesHealthVIew
{
    public static function isGetRoutesWorkingCorrectly(): bool
    {
        $routes = ServiceRoute::getRoutes();

        foreach ($routes as $route) {
            /** @var Route $route */

//            if (str_starts_with($route->uri(), 'api')) {
//                continue;
//            }

            if ($route->getPrefix() == 'api') {
                continue;
            }

//            preg_match('/{(.*?)}/', $route->uri(), $matches);
//
//            if (!empty($matches)) {
//                continue;
//            }

            if ($route->hasParameters()) {
                continue;
            }

            if (!in_array('GET', $route->methods)) {
                continue;
            }

            if (str_starts_with($route->uri, '_')) {
                continue;
            }

//            $action = $route->getAction()['uses'];
//
//            try {
//                if ($action instanceof \Closure) {
//                    $response = $action(new Request());
//                } else {
//                    /** @var string $action */
//                    $response = App::call($action);
//                }
//
//                if ($response->getStatusCode() != 200) {
//                    return false;
//                }
//            } catch (Exception $exception) {
//                return false;
//            }

            $request = Request::create($route->uri());

            $response = App::handle($request);

            if ($response->status() !== 200) {
                return false;
            }
        }

        return true;
    }
}
