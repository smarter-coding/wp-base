<?php

use BoxyBird\Inertia\Inertia;
use EliPett\Transformation\Services\Transform;
use EliPett\Transformation\Transformers\PostTransformer;

return Inertia::render('Index', [
    'posts' => Transform::all($posts, PostTransformer::class)
]);
