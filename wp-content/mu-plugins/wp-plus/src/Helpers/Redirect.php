<?php

namespace SmarterCoding\WpPlus\Helpers;

class Redirect
{
    public function to($url)
    {
        header('Location: ' . $url);
        die;
    }
}
