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

class UserClient
{
    public function client($accessToken, $openId)
    {
        $client = $this->reload();

        $params = [
            'access_token' => $accessToken,
            'openid' => $openId,
            'transaction_id' => '',
        ];
        // TODO get ['query' => []]  post ['form_params' => $params]
        return $client->get('/wxa/getpaidunionid', ['query' => $params])->getBody()->getContents();
    }

    protected function reload()
    {
        $factory = new HandlerStackFactory();

        $option = [
            'max_connections' => 50,
        ];

        $stack = $factory->create($option);

        return make(Client::class, [
            'config' => [
                'base_uri' => 'https://api.weixin.qq.com/',
                'handler' => $stack,
            ],
        ]);
    }
}
