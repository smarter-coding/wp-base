<?php

namespace SmarterCoding\WpBase\Commands;

use SmarterCoding\WpBase\Providers\ThemeServiceProvider;
use SmarterCoding\WpPlus\Command;

class Seed extends Command
{
    public const NAME = 'seed';

    public function handle(): bool
    {
        $post_type = $this->arg(0);
        $number = $this->arg(1);

        if (!array_key_exists($post_type, ThemeServiceProvider::FACTORIES)) {
            return $this->error("There is no registered factory for post type: $post_type");
        }

        $class = ThemeServiceProvider::FACTORIES[$post_type];
        $factory = new $class();
        $factory->make($number);

        return true;
    }
}
