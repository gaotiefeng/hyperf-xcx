<?php


namespace App\Services\Redis;


use Gao\redisApplication\listApplication;
use Hyperf\Di\Container;

class MessageListRedis extends listApplication
{
    protected $prefix = "openId:list";

    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function redis()
    {
        return $this->container->get(\Redis::class);
    }

    public function messagePush($openId,$fd, $message)
    {
        $data['fd'] = $fd;
        $data['openid'] = $openId;
        $data['data'] = $message;
        $val = json_encode($data);

        return parent::rPush($openId,$val);
    }

    public function messagePop($openId)
    {
        return parent::lPop($openId);
    }
}