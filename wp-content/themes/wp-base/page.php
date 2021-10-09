<?php

use BoxyBird\Inertia\Inertia;

return Inertia::render('Page', [
    'page' => [
        'title' => get_the_title(),
        'content' => apply_filters('the_content', get_the_content())
    ]
]);
