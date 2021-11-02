<?php

namespace SmarterCoding\WpBase\Providers;

use BoxyBird\Inertia\Inertia;
use SmarterCoding\WpBase\Commands\Seed;
use SmarterCoding\WpBase\Factories\PostFactory;
use SmarterCoding\WpPlus\ServiceProvider;
use SmarterCoding\WpPlus\Helpers\Asset;
use SmarterCoding\WpPlus\Helpers\Router;

class ThemeServiceProvider extends ServiceProvider
{
    protected $commands = [
        Seed::class
    ];

    protected $factories = [
        'post' => PostFactory::class
    ];

    public function boot()
    {
        parent::boot();

        config()->load(__DIR__ . '/../../config/*');
    }

    public function afterSetupTheme()
    {
        $features = config()->get('theme.supports');

        foreach ($features as $feature) {
            add_theme_support($feature);
        }
    }

    public function init()
    {
        Inertia::share([
            'site' => [
                'name' => get_bloginfo('name'),
                'description'=> get_bloginfo('description'),
            ]
        ]);

        register_nav_menus([
            'main_menu' => __('Main Menu')
        ]);
    }

    public function wpLoaded()
    {
        Router::init();
    }

    public function wpEnqueueScripts()
    {
        Asset::css('css/main.css')
            ->enqueue();

        Asset::js('js/main.js')
            ->enqueue();
    }
}
