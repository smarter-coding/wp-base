<?php

namespace SmarterCoding\WpPlus;

class App
{
    private static $instance = null;
    private $config = [];

    private function __construct()
    {
        //
    }

    public static function getInstance(): App
    {
        if (self::$instance === null) {
            self::$instance = new App();
        }

        return self::$instance;
    }

    public function get($key)
    {
        return $this->config[$key];
    }

    public function set($key, $value)
    {
        $this->config[$key] = $value;
    }

    public function push($key, $value)
    {
        if (!isset($this->config[$key])) {
            $this->config[$key] = [];
        }

        $this->config[$key][] = $value;
    }

    public function merge($key, $values)
    {
        if (!isset($this->config[$key])) {
            $this->config[$key] = [];
        }

        $this->config[$key] = array_merge($this->config[$key], $values);
    }
}
