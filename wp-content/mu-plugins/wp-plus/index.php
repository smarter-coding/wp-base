<?php

require_once __DIR__ . '/vendor/autoload.php';

use SmarterCoding\WpPlus\App;
use SmarterCoding\WpPlus\Services\Config;
use SmarterCoding\WpPlus\Services\Response;

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

function response()
{
    return new Response();
}