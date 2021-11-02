<?php

namespace SmarterCoding\WpPlus;

use SmarterCoding\WpPlus\Commands\Seed;

class AppServiceProvider extends ServiceProvider
{
    protected $commands = [
        Seed::class
    ];
}
