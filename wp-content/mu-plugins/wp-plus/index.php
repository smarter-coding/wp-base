<?php

require_once __DIR__ . '/vendor/autoload.php';

use SmarterCoding\WpPlus\App;
use SmarterCoding\WpPlus\Helpers\Config;
use SmarterCoding\WpPlus\Helpers\Response;
use SmarterCoding\WpPlus\AppServiceProvider;

$appServiceProvider = new AppServiceProvider();
$appServiceProvider->boot();

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
