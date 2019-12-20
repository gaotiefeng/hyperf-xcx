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

namespace App\Services\Redis;

use Gao\redisApplication\stringApplication;
use Hyperf\Di\Container;
use Swoole\Coroutine\Redis;

class OpenStrRedis extends stringApplication
{
    protected $prefix = 'openId';

    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function redis()
    {
        return $this->container->get(\Redis::class);
    }

    public function setOpenId($openId, $fd)
    {
        return $this->set($openId, $fd);
    }

    public function getFd($openId)
    {
        return $this->get($openId);
    }
}
