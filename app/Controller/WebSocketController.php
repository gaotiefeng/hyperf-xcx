<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\Redis\StringRedis;
use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;
use Swoole\Http\Request;
use Swoole\Websocket\Frame;
use Swoole\WebSocket\Server;

class WebSocketController implements OnMessageInterface,OnCloseInterface,OnOpenInterface
{
    public function onOpen(Server $server, Request $request): void
    {
        $get = $request->get;
        $openId = $get['openid'];

        $redis = di()->get(StringRedis::class)->setOpenId($openId,$request->fd);
        if(empty($openId) || !$redis) {
            $openId = 'error';
        }

        $server->push($request->fd, 'openid is '.$openId);
    }

    public function onMessage(Server $server, Frame $frame): void
    {
        $openId = 'oCID10O8mXhkB2StEjNrL9wytUcU';
        $fd = di()->get(StringRedis::class)->getFd($openId);
        $fd = intval($fd);
        
        $server->push($fd, $frame->data);
    }

    public function onClose(\Swoole\Server $server, int $fd, int $reactorId): void
    {
        echo $fd;
        echo PHP_EOL;
        echo $reactorId;
    }
}
