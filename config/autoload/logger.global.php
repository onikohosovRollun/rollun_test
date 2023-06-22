<?php

use Psr\Log\LoggerInterface;
use rollun\logger\Writer\Db;
use rollun\logger\Formatter\ContextToString;

return [
    'log' => [
        LoggerInterface::class => [
            'writers' => [
                'db_writer' => [
                    'name' => Db::class,
                    'options' => [
                        'db' => 'db',
                        'table' => 'logs',
                        'column' => [
                            'id' => 'id',
                            'timestamp' => 'timestamp',
                            'message' => 'message',
                            'level' => 'level',
                            'priority' => 'priority',
                            'context' => 'context',
                            'lifecycle_token' => 'lifecycle_token',
                        ],
                        'filters' => [
                            [
                                'name' => 'priority',
                                'options' => [
                                    'operator' => getenv('APP_DEBUG') == 'true' ? '<=' : '<',
                                    'priority' => 7,
                                ],
                            ],
                        ],
                        'formatter' => ContextToString::class,
                    ],
                ],
            ],
        ],
    ],
];