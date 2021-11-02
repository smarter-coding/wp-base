<?php

namespace SmarterCoding\WpPlus\Services;

use AltoRouter;

class Router
{
    private static function router(): AltoRouter
    {
        return app()->singleton(AltoRouter::class);
    }

    public static function init()
    {
        if ($route = self::router()->match()) {
            $response = call_user_func($route['target'], $route['params']);
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
