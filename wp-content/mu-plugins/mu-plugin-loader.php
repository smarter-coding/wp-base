<?php
/**
 * Plugin Name: Mu Plugin Loader
 */

require_once __DIR__ . '/../../vendor/autoload.php';

foreach (glob(__DIR__ . '/*/index.php') as $path) {
    require_once $path;
}
