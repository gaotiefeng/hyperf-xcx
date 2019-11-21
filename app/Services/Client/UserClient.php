<?php


namespace App\Services\Client;


use GuzzleHttp\Client;
use Hyperf\Guzzle\HandlerStackFactory;

class UserClient
{

    protected function reload()
    {
        $factory = new HandlerStackFactory();

        $option = [
            'max_connections' => 50,
        ];

        $stack = $factory->create($option);


        $client = make(Client::class, [
            'config' => [
                'base_uri' => 'https://api.weixin.qq.com/',
                'handler' => $stack,
            ],
        ]);

        return $client;
    }

    public function client($accessToken, $openId)
    {
        $client = $this->reload();

        $params = [
            'access_token' => $accessToken,
            'openid' =>  $openId,
        ];
        // TODO get ['query' => []]  post ['form_params' => $params]
        return $client->get('/wxa/getpaidunionid', ['query' => $params])->getBody()->getContents();
    }
}