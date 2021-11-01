<?php

namespace SmarterCoding\WpPlus;

class Config
{
    private static $instance = null;
    private $data = [];

    private function __construct()
    {
        //
    }

    public static function getInstance(): Config
    {
        if (self::$instance === null) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    public function get($key)
    {
        $keys = explode('.', $key);
        $data = $this->data;

        foreach ($keys as $key) {
            $data = $data[$key];
        }

        return $data;
    }

    public function load($path)
    {
        foreach (glob($path) as $file) {
            $filename = substr(basename($file), 0, -4);
            $this->data[$filename] = include $file;
        }
    }
}
