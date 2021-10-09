<?php

namespace SmarterCoding\WpBase\Contracts;

use Faker\Generator;

interface Factory
{
    public function get(Generator $faker): array;
}
