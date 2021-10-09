<?php

namespace SmarterCoding\WpPlus;

use WP_CLI;

class ServiceProvider
{
    public function boot()
    {
        $app = app();

        $actions = get_class_methods($this);

        foreach ($actions as $action) {
            if (!in_array($action, ['boot']) && method_exists($this, $action)) {
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
