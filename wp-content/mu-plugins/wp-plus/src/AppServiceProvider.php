<?php

namespace SmarterCoding\WpPlus;

use SmarterCoding\WpPlus\Commands\Make;
use SmarterCoding\WpPlus\Commands\Migrate;
use SmarterCoding\WpPlus\Commands\Seed;

class AppServiceProvider extends ServiceProvider
{
    protected $commands = [
        Make::class,
        Migrate::class,
        Seed::class
    ];
}
