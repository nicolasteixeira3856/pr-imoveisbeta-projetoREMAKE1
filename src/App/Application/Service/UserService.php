<?php

declare(strict_types=1);

namespace App\Application\Service;

final class UserService
{
    /** @var array  */
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

}