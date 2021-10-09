<?php

namespace SmarterCoding\WpBase\Commands;

use Faker\Factory;
use SmarterCoding\WpPlus\Services\Faker;
use SmarterCoding\WpPlus\Command;

class Seed extends Command
{
    public $name = 'seed';

    public function handle(): bool
    {
        $faker = Factory::create();
        $faker->addProvider(Faker::class);

        // todo: load factory using parameter as post type

        return true;
    }
}
