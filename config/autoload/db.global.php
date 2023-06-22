<?php

use Laminas\Db\Adapter\AdapterInterface;

return [
    'dependencies' => [
        'aliases' => [
            'db' => AdapterInterface::class,
        ],
    ],
    'db' => [
        'driver' => getenv('DB_DRIVER') ?: 'Pdo_Mysql',
        'database' => $_ENV['DB_NAME'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASS'],
        'hostname' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'] ?: 3306,
    ],
];




