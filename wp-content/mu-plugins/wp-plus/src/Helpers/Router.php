<?php

namespace SmarterCoding\WpPlus\Helpers;

use AltoRouter;
use SmarterCoding\WpPlus\Structs\Request;
use ReflectionParameter;

class Router
{
    private static function router(): AltoRouter
    {
        return app()->singleton(AltoRouter::class);
    }

    public static function init()
    {
        if ($route = self::router()->match()) {
            $requestType = (new ReflectionParameter($route['target'], 'request'))
                ->getType()
                ->getName();

            /** @var Request $request */
            $request = $requestType::createFromGlobals();
            $request->setRouteParameters($route['params']);
            $request->validate();

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
