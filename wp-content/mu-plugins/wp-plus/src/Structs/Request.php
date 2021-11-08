<?php

namespace SmarterCoding\WpPlus\Structs;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Validator;
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

    public function validate()
    {
        if (method_exists($this, 'rules')) {
            $valid = true; // todo: return Validation::validate($this->rules(), $this->request->all())

            if (!$valid) {
                // todo: flash errors
                $url = $this->headers->get('referer');
                redirect()->to($url);
            }
        }
    }
}
