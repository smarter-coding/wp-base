<?php

require_once __DIR__ . '/vendor/autoload.php';

use SmarterCoding\WpBase\Providers\ThemeServiceProvider;

$themeServiceProvider = new ThemeServiceProvider();
$themeServiceProvider->boot();
