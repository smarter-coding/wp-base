<?php

require_once __DIR__ . '/vendor/autoload.php';

use EliPett\Transformation\Services\Transform;
use SmarterCoding\WpBase\Transformers\PostTransformer;
use SmarterCoding\WpBase\Providers\ThemeServiceProvider;

$themeServiceProvider = new ThemeServiceProvider();
$themeServiceProvider->boot();

$router = new AltoRouter();

$router->map('GET', '/html/[i:id]', function($params) {
    $post = get_post($params['id']);

    return response()
        ->render('Page', [
            'page' => Transform::one($post, PostTransformer::class)
        ]);
});

$router->map('GET', '/json/[i:id]', function($params) {
    $post = get_post($params['id']);

    $item = Transform::one($post, PostTransformer::class);

    return response()
        ->json($item);
});

add_action('wp_loaded', function() use ($router) {
    if ($route = $router->match()) {
        $response = call_user_func($route['target'], $route['params']);
        $response->send();
    }
});
