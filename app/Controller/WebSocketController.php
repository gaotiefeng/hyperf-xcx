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

namespace App\Controller;

use App\Services\Redis\MessageListRedis;
use App\Services\Redis\OpenStrRedis;
use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;
use Swoole\Http\Request;
use Swoole\Websocket\Frame;
use Swoole\WebSocket\Server;

class WebSocketController implements OnMessageInterface, OnCloseInterface, OnOpenInterface
{
    public function onOpen(Server $server, Request $request): void
    {
        $get = $request->get;
        $openId = $get['openid'];
        //ws://192.168.20.39:9503?openid=oCID10O8mXhkB2StEjNrL9wytUcU
        $redis = di()->get(OpenStrRedis::class)->setOpenId($openId, $request->fd);
        if (empty($openId) || ! $redis) {
            $openId = 'error';
        }
        $server->push($request->fd, 'open is' . $openId);
    }

    public function onMessage(Server $server, Frame $frame): void
    {
        //TODO 接收数据$frame->data
        $openId = 'oCID10O8mXhkB2StEjNrL9wytUcU';
        // TODO 发送人
        $fd = di()->get(OpenStrRedis::class)->getFd($openId);
        $fd = intval($fd);
        //TODO 存储消息
        $message = di()->get(MessageListRedis::class)->messagePush($openId, $fd, $frame->data);
        //TODO 推送消息的合理性
        //$pop = di()->get(MessageListRedis::class)->messagePop($openId);
        //$data = json_decode($pop,true);

        $server->push($frame->fd, $frame->data);
    }

    public function onClose(\Swoole\Server $server, int $fd, int $reactorId): void
    {
        echo $fd;
        echo PHP_EOL;
        echo $reactorId;
    }
}
