<?php

declare(strict_types=1);

namespace App\Controller;

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
        $server->push($request->fd, "open");
    }

    public function onMessage(Server $server, Frame $frame): void
    {
        $server->push($frame->fd, $frame->data);
    }

    public function onClose(\Swoole\Server $server, int $fd, int $reactorId): void
    {
        echo $fd;
        echo $reactorId;
    }
}
