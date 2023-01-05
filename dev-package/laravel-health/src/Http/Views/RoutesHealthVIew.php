<?php

namespace QueraCollege\LaravelHealth\Http\Views;

use Exception;
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
            if (str_starts_with($route->uri(), 'api')) {
                continue;
            }

            preg_match('/{(.*?)}/', $route->uri(), $matches);

            if (!empty($matches)) {
                continue;
            }

            if (!in_array('GET', $route->methods)) {
                continue;
            }

            $action = $route->getAction()['uses'];

            try {
                if ($action instanceof \Closure) {
                    $response = $action(new Request());
                } else {
                    /** @var string $action */
                    $response = App::call($action);
                }

                if ($response->getStatusCode() != 200) {
                    return false;
                }
            } catch (Exception $exception) {
                return false;
            }
        }

        return true;
    }
}
