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
            ],
        ]);
    }
    public function client($accessToken, $openId, $formId)

    {
        $client = $this->reload();
        $data = '"data":{
            "keyword5":{
                "value":"2019-03-28"
            },
            "keyword6":{
                "value":"您关注的航班降价了!现在购买该航班,将为您节省金额:80元"
            },
            "keyword3":{
                "value":"CA1858"
            },
            "keyword4":{
                "value":"上海-北京"
            },
            "keyword1":{
                "value":"【汇选航班】关注航班降价通知"
            },
            "keyword2":{
                "value":"750"
            }
        }';
            $params = [
                'touser' => $openId,
                'template_id' => $this->remarkId,
                'form_id' => $formId,
                'page' => 'index',
                'data' => $data,
            ];

        $this->logger->info(json_encode($params));
        // TODO get ['query' => []]  post ['form_params' => $params]
        $result = $client->post('/cgi-bin/message/wxopen/template/send?access_token='.$accessToken, ['headers' => ['Content-Type' => 'application/json'],'form_params' => $params])->getBody()->getContents();

        $this->logger->info('Template info');
        $this->logger->info(json_encode($result));

        return $result;
    }


}
