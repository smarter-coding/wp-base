<?php

require_once __DIR__ . '/vendor/autoload.php';

use BoxyBird\Inertia\Inertia;
use SmarterCoding\WpBase\Helpers\Asset;

function dd($dump) {
    var_dump($dump);
    die();
}

add_action('wp_enqueue_scripts', function() {
    Asset::css('css/main.css')
        ->enqueue();

    Asset::js('js/main.js')
        ->enqueue();
});

add_action('init', function () {
    Inertia::share([
        'site' => [
            'name' => get_bloginfo('name'),
            'description'=> get_bloginfo('description'),
        ]
    ]);
});

if (class_exists('WP_CLI')) {
    $command = new \SmarterCoding\WpBase\Commands\Seed();
    WP_CLI::add_command($command->name, [$command, 'run']);
}
