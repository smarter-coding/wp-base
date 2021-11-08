<?php

namespace SmarterCoding\WpPlus;

use WP_CLI;

class ServiceProvider
{
    public function loadConfig($path)
    {
        config()->load($path);
    }

    public function loadMigrations($path)
    {
        app()->push('migrations', $path);
    }

    public function loadTranslations($path, $namespace)
    {
        trans()->load($namespace, $path);
    }

    public function boot()
    {
        $app = app();

        $actions = get_class_methods($this);
        $exclude = get_class_methods(ServiceProvider::class);

        foreach ($actions as $action) {
            if (!in_array($action, $exclude) && method_exists($this, $action)) {
                add_action(lower_snake_case($action), [$this, $action]);
            }
        }

        if (isset($this->factories)) {
            $app->merge('factories', $this->factories);
        }

        if (class_exists('WP_CLI') && isset($this->commands)) {
            foreach ($this->commands as $command) {
                WP_CLI::add_command($command::NAME, [$command, 'run']);
            }
        }
    }
}
