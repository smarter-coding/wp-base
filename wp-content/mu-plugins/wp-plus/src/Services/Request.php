<?php

namespace SmarterCoding\WpPlus\Services;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request extends SymfonyRequest
{
    private $routeParameters;

    public function setRouteParameters($parameters)
    {
        $this->routeParameters = $parameters;
    }

    public function route($key)
    {
        if (!isset($this->routeParameters[$key])) {
            throw new \InvalidArgumentException("Invalid route parameter: {$key}");
        }

        return $this->routeParameters[$key];
    }
}
