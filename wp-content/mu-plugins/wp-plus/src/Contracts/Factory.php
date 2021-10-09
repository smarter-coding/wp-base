<?php

namespace SmarterCoding\WpPlus\Contracts;

use Faker\Generator;

interface Factory
{
    public function get(Generator $faker): array;
}
