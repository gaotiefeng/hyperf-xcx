<?php


namespace App\Services;


use Psr\Container\ContainerInterface;

class Services
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}