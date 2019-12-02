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

use App\Services\Services;
use EasyWeChat\Factory;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Hyperf\Config\Annotation\Value;
use Hyperf\Guzzle\HandlerStackFactory;

class UserClient extends Services
{
    /**
     * @var HandlerStack
     */
    protected $stack;

    /**
     * @Value(key="xcx.client.uri")
     */
    protected $uri;

    /**
     * @Value(key="xcx.client.template_id.remark_id")
     */
    protected $remarkId;

    protected function getStack()
    {
        if ($this->stack instanceof HandlerStack) {
            return $this->stack;
        }
        return $this->stack = di()->get(HandlerStackFactory::class)->create();
    }

    protected function reload()
    {

        return make(Client::class, [
            'config' => [
                'base_uri' => $this->uri,
                'handler' => $this->getStack(),
                'headers' => [
                    'Content-type' => 'application/json',
                    ]
            ],
        ]);
    }
    public function client($accessToken, $openId, $formId)

    {
        $client = $this->reload();

        $params = [
            'touser' => $openId,
            'template_id' => $this->remarkId,
            'form_id' => $formId,
            'page' => 'index',
            'data' => [
                'keyword1' => '12122',
                'keyword2' => '12122',
                'keyword3' => '12122',
                'keyword4' => '12122',
                'keyword5' => '12122',
            ],
        ];

        $config = config('xcx');
        $app = Factory::miniProgram($config);

        $res = $app->template_message->send($params);

        $this->logger->info(json_encode($res));

        $this->logger->info(json_encode($params));
        // TODO get ['query' => []]  post ['form_params' => $params]

        $result = $client->post('/cgi-bin/message/wxopen/template/send?access_token='.$accessToken, ['json' => $params])->getBody()->getContents();

        $this->logger->info('Template info');
        $this->logger->info(json_encode($result));

        return $result;
    }


}
