<?php

namespace SmarterCoding\WpBase\Providers;

use BoxyBird\Inertia\Inertia;
use SmarterCoding\WpBase\Commands\Seed;
use SmarterCoding\WpBase\Factories\PostFactory;
use SmarterCoding\WpPlus\ServiceProvider;
use SmarterCoding\WpPlus\Services\Asset;

class ThemeServiceProvider extends ServiceProvider
{
    protected $commands = [
        Seed::class
    ];

    protected $factories = [
        'post' => PostFactory::class
    ];

    public function init()
    {
        Inertia::share([
            'site' => [
                'name' => get_bloginfo('name'),
                'description'=> get_bloginfo('description'),
            ]
        ]);
    }

    public function wpEnqueueScripts()
    {
        Asset::css('css/main.css')
            ->enqueue();

        Asset::js('js/main.js')
            ->enqueue();
    }
}
