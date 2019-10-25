<?php

declare(strict_types=1);

namespace App\Infrastructure\Container\Application\Factory;

use App\Application\Service\HomeService;
use Psr\Container\ContainerInterface;

class HomeServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return HomeService
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        return new HomeService($config['twig']);
    }
}
