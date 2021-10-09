<?php

require_once __DIR__ . '/vendor/autoload.php';

use SmarterCoding\WpBase\Providers\ThemeServiceProvider;

function dd($dump)
{
    var_dump($dump);
    die();
}

$themeServiceProvider = new ThemeServiceProvider();
$themeServiceProvider->boot();
