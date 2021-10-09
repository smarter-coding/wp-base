<?php

namespace SmarterCoding\WpBase\Commands;

use SmarterCoding\WpPlus\Command;

class Seed extends Command
{
    public const NAME = 'seed';

    public function handle(): bool
    {
        $post_type = $this->arg(0);
        $number = $this->arg(1);

        $factories = app()->get('factories');

        if (!array_key_exists($post_type, $factories)) {
            return $this->error("There is no registered factory for post type: $post_type");
        }

        $factory = new $factories[$post_type]();
        $factory->make($number);

        $this->line("Created $number posts of type: $post_type", self::GREEN);

        return true;
    }
}