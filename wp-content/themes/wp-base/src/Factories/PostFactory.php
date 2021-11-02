<?php

namespace SmarterCoding\WpBase\Factories;

use SmarterCoding\WpPlus\Factories\Factory;

class PostFactory extends Factory
{
    public function get(): array
    {
        return [
            'post_type' => 'post',
            'post_title' => $this->faker->text(25),
            'post_status' => 'publish',
            'post_content' => $this->faker->wp_paragraphs(3)
        ];
    }
}
