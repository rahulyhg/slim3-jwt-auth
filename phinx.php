<?php

require_once __DIR__.'/app/app.php';
require_once __DIR__.'/app/container.php';

$db = $container->settings['db'];

return [
    'paths' => [
        'migrations' => 'src/Migrations',
        'seeds' => 'src/Seeds',
    ],
    'environments' => [
        'default' => [
            'adapter' => $db['driver'],
            'host' => $db['host'],
            'name' => $db['database'],
            'user' => $db['username'],
            'pass' => $db['password'],
        ],
        'default_migration_table' => 'migrations',
    ],
    'migration_base_class' => "App\Migrations\AbstractMigration",
    'templates' => [
        'file' => 'src/Migrations/Migration.php.dist',
    ],
];
