<?php

require_once __DIR__ . '/vendor/autoload.php';

use SmarterCoding\WpPlus\App;
use SmarterCoding\WpPlus\Config;

function dd($dump)
{
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
    die();
}

function app(): App
{
    return App::getInstance();
}

function config(): Config
{
    return app()->singleton(Config::class);
}
