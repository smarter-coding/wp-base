<?php

namespace SmarterCoding\WpPlus\Commands;

use SmarterCoding\FileGenerator\Generator;

class Make extends Command
{
    public const NAME = 'make';
    protected $signature = '{type} {name}';

    public function handle(): bool
    {
        $type = ucfirst($this->arg('type'));
        $method = "make{$type}";

        return $this->$method();
    }

    private function makeMigration()
    {
        $name = $this->arg('name');

        $migrationPaths = app()->get('migrations');

        if (!isset($migrationPaths[0])) {
            throw new \InvalidArgumentException("No migration path is set");
        }

        $migrationPath = $migrationPaths[0];

        $filename = date('Y_m_d_His') . "_{$name}.php";

        $generator = new Generator(__DIR__ . '/../Templates/generators/migration.gen');
        $generator->generate($migrationPath . '/' . $filename, [
            'name' => $name
        ]);

        return true;
    }
}
