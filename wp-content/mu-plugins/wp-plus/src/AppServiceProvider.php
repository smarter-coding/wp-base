<?php

namespace SmarterCoding\WpPlus;

use SmarterCoding\WpPlus\Commands\Migrate;
use SmarterCoding\WpPlus\Commands\Seed;

class AppServiceProvider extends ServiceProvider
{
    protected $commands = [
        Migrate::class,
        Seed::class
    ];
}
