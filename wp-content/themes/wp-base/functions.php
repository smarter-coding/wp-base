<?php

require_once __DIR__ . '/vendor/autoload.php';

use EliPett\Transformation\Services\Transform;
use SmarterCoding\WpBase\Transformers\PostTransformer;
use SmarterCoding\WpBase\Providers\ThemeServiceProvider;
use SmarterCoding\WpPlus\Services\Router;
use SmarterCoding\WpPlus\Services\Request;

$themeServiceProvider = new ThemeServiceProvider();
$themeServiceProvider->boot();

Router::get('/html/[i:id]', function(Request $request) {
    $post = get_post($request->route('id'));

    return response()
        ->render('Page', [
            'page' => Transform::one($post, PostTransformer::class)
        ]);
});

Router::get('/json/[i:id]', function(Request $request) {
    $post = get_post($request->route('id'));

    $item = Transform::one($post, PostTransformer::class);

    return response()
        ->json($item);
});
