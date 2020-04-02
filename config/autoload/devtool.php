<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

return [
    'generator' => [
        'amqp' => [
            'consumer' => [
                'namespace' => 'app\\Amqp\\Consumer',
            ],
            'producer' => [
                'namespace' => 'app\\Amqp\\Producer',
            ],
        ],
        'aspect' => [
            'namespace' => 'app\\Aspect',
        ],
        'command' => [
            'namespace' => 'app\\Command',
        ],
        'controller' => [
            'namespace' => 'app\\Controller',
        ],
        'job' => [
            'namespace' => 'app\\Job',
        ],
        'listener' => [
            'namespace' => 'app\\Listener',
        ],
        'middleware' => [
            'namespace' => 'app\\Middleware',
        ],
        'Process' => [
            'namespace' => 'app\\Processes',
        ],
    ],
];
