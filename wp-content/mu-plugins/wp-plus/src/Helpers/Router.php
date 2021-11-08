<?php

namespace SmarterCoding\WpPlus\Helpers;

use AltoRouter;
use SmarterCoding\WpPlus\Structs\Request;
use ReflectionParameter;

class Router
{
    public static $middleware = [];

    private static function router(): AltoRouter
    {
        return app()->singleton(AltoRouter::class);
    }

    public static function init()
    {
        if ($route = self::router()->match()) {
            $meta = $route['meta'];

            if (isset($meta['middleware'])) {
                foreach ($meta['middleware'] as $middleware) {
                    echo $middleware; // todo: instantiate and run middleware
                }
            }

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

    public static function middleware($middleware, $callable)
    {
        if (is_array($middleware)) {
            self::$middleware = $middleware;
        } else {
            self::$middleware = [$middleware];
        }

        call_user_func($callable);

        self::$middleware = null;
    }

    public static function get($route, $callable)
    {
        self::router()->map('GET', $route, $callable, [
            'middleware' => self::$middleware
        ]);
    }

    public static function post($route, $callable)
    {
        self::router()->map('POST', $route, $callable, [
            'middleware' => self::$middleware
        ]);
    }
}

