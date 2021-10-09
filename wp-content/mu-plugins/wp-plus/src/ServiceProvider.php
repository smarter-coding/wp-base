<?php

namespace SmarterCoding\WpPlus;

use WP_CLI;

class ServiceProvider
{
    protected $command = [];
    protected $factories = [];

    public function boot()
    {
        $actions = get_class_methods($this);

        foreach ($actions as $action) {
            if (!in_array($action, ['boot']) && method_exists($this, $action)) {
                add_action(lower_snake_case($action), [$this, $action]);
            }
        }

        if (class_exists('WP_CLI')) {
            foreach ($this->commands as $command) {
                WP_CLI::add_command($command::NAME, [$command, 'run']);
            }
        }
    }
}
