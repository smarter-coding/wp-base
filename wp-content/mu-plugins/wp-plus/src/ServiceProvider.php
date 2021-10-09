<?php

namespace SmarterCoding\WpPlus;

class ServiceProvider
{
    public function boot()
    {
        $actions = get_class_methods($this);

        foreach ($actions as $action) {
            if (!in_array($action, ['boot']) && method_exists($this, $action)) {
                add_action(lower_snake_case($action), [$this, $action]);
            }
        }
    }
}
