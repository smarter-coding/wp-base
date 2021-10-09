<?php

require_once __DIR__ . '/vendor/autoload.php';

use SmarterCoding\WpPlus\App;

function dd($dump)
{
    var_dump($dump);
    die();
}

function app(): App
{
    return App::getInstance();
}
