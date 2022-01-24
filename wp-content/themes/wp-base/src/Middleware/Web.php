<?php

namespace SmarterCoding\WpBase\Middleware;

use SmarterCoding\WpPlus\Contracts\Middleware;
use SmarterCoding\WpPlus\Structs\Request;

class Web implements Middleware
{
    public function run(Request $request)
    {
        echo 'middleware:web';
    }
}
