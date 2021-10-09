<?php

namespace SmarterCoding\WpBase\Factories;

use Faker\Generator;
use SmarterCoding\WpPlus\Contracts\Factory;

class PostFactory implements Factory
{
    public function get(Generator $faker): array
    {
        return [
            'post_type' => 'post',
            'post_title' => $faker->title,
            'post_status' => 'publish',
            'post_content' => $faker->wp_paragraphs(1)
        ];
    }
}
