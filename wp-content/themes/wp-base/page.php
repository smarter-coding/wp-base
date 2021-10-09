<?php

use BoxyBird\Inertia\Inertia;
use EliPett\Transformation\Services\Transform;
use SmarterCoding\WpBase\Transformers\PostTransformer;

global $post;

Inertia::render('Page', [
    'page' => Transform::one($post, PostTransformer::class)
]);

return;
