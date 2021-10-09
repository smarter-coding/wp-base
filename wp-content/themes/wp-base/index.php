<?php

use BoxyBird\Inertia\Inertia;
use EliPett\Transformation\Services\Transform;
use SmarterCoding\WpBase\Transformers\PostTransformer;

return Inertia::render('Index', [
    'posts' => Transform::all($posts, PostTransformer::class)
]);
