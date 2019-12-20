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

namespace App\Services\Client;

use GuzzleHttp\Client;
use Hyperf\Guzzle\HandlerStackFactory;

class Demo
{
    public function client()
    {
        $factory = new HandlerStackFactory();

        $option = [
            'max_connections' => 50,
        ];

        $stack = $factory->create($option);

        $client = make(Client::class, [
            'config' => [
                'base_uri' => '127.0.0.1:9521',
                'handler' => $stack,
            ],
        ]);

        $params = [
            'offset' => 0,
            'limit' => 2,
        ];
        // TODO get ['query' => []]  post ['form_params' => $params]  post ['form_params' => $params 'json'=>]
        return $client->get('/admin/index', ['query' => $params])->getBody()->getContents();
    }
}
