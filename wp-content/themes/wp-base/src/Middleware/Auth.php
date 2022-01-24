<?php

namespace SmarterCoding\WpBase\Middleware;

use SmarterCoding\WpPlus\Contracts\Middleware;
use SmarterCoding\WpPlus\Structs\Request;

class Auth implements Middleware
{
    public function run(Request $request)
    {
        if (!is_user_logged_in()) {
            redirect()->to(wp_login_url());
        }
    }
}
