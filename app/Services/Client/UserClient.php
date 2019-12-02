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
use GuzzleHttp\HandlerStack;
use Hyperf\Config\Annotation\Value;
use Hyperf\Guzzle\HandlerStackFactory;

class UserClient
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
                    'keyword1' => ['value'=>'keyword1'],
                    'keyword2' => ['value'=>'keyword2']
                ],
                'emphasis_keyword' => 'keyword1',
            ];
        // TODO get ['query' => []]  post ['form_params' => $params]
        return $client->post('/cgi-bin/message/wxopen/template/send?access_token='.$accessToken, ['query' => $params])->getBody()->getContents();
    }


}
