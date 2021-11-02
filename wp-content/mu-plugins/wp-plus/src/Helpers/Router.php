<?php

namespace SmarterCoding\WpPlus\Helpers;

use AltoRouter;
use SmarterCoding\WpPlus\Structs\Request;

class Router
{
    private static function router(): AltoRouter
    {
        return app()->singleton(AltoRouter::class);
    }

    public static function init()
    {
        if ($route = self::router()->match()) {
            $request = Request::createFromGlobals();
            $request->setRouteParameters($route['params']);

            $response = call_user_func($route['target'], $request);
            $response->send();
        }
    }

    public static function get($route, $callable)
    {
        self::router()->map('GET', $route, $callable);
    }

    public static function post($route, $callable)
    {
        self::router()->map('POST', $route, $callable);
    }
}
