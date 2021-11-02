<?php

require_once __DIR__ . '/vendor/autoload.php';

use EliPett\Transformation\Services\Transform;
use SmarterCoding\WpBase\Transformers\PostTransformer;
use SmarterCoding\WpBase\Providers\ThemeServiceProvider;
use SmarterCoding\WpPlus\Services\Router;

$themeServiceProvider = new ThemeServiceProvider();
$themeServiceProvider->boot();

Router::get('/html/[i:id]', function($params) {
    $post = get_post($params['id']);

    return response()
        ->render('Page', [
            'page' => Transform::one($post, PostTransformer::class)
        ]);
});

Router::get('/json/[i:id]', function($params) {
    $post = get_post($params['id']);

    $item = Transform::one($post, PostTransformer::class);

    return response()
        ->json($item);
});
