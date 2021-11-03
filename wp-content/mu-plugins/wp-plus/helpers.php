<?php

use SmarterCoding\WpPlus\App;
use SmarterCoding\WpPlus\Helpers\Config;
use SmarterCoding\WpPlus\Helpers\Response;

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

function response(): Response
{
    return new Response();
}
