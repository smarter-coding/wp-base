<?php

namespace SmarterCoding\WpBase\Helpers;

use SmarterCoding\WpBase\Structs\ScriptAsset;
use SmarterCoding\WpBase\Structs\StyleAsset;

class Asset
{
    public static function css($path): StyleAsset
    {
        return new StyleAsset($path);
    }

    public static function js($path): ScriptAsset
    {
        return new ScriptAsset($path);
    }

    public static function enqueue($asset)
    {
        if (strpos($asset, '.css')) {
            wp_enqueue_style($asset);
        }

        if (strpos($asset, '.js')) {
            wp_enqueue_script($asset);
        }
    }
}
