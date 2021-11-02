<?php

namespace SmarterCoding\WpPlus\Services;

use AltoRouter;

class Router
{
    private static function router(): AltoRouter
    {
        return app()->singleton(AltoRouter::class);
    }

    public static function match()
    {
        return self::router()->match();
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
