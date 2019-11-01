<?php

declare(strict_types=1);

namespace App\Infrastructure\Container\Application\Factory;

use App\Application\Service\UserService;
use Psr\Container\ContainerInterface;

class UserServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return UserService
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        return new UserService($config['twig']);
    }
}