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

namespace App\Services;

use Hyperf\Contract\StdoutLoggerInterface;
use Psr\Container\ContainerInterface;

class Services
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        //$this->logger = di()->get(StdoutLoggerInterface::class);
        $this->logger = $container->get(StdoutLoggerInterface::class);
    }
}
