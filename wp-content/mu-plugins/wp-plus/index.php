<?php

require_once __DIR__ . '/vendor/autoload.php';

use SmarterCoding\WpPlus\App;
use SmarterCoding\WpPlus\Services\Config;

function dd($dump)
{
    var_dump($dump);
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
