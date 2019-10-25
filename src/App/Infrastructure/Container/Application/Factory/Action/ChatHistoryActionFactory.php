<?php

declare(strict_types=1);

namespace App\Infrastructure\Container\Application\Factory\Action;

use App\Application\Service\BooService;
use App\Application\Service\OmniChatService;
use App\Http\Action\Attendance\OmniChat\GetChatHistoryAction;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ChatHistoryActionFactory
{
    public function __invoke(ContainerInterface $container, $requestedService) : RequestHandlerInterface
    {
         $omniChatService = $container->get(OmniChatService::class);
         $booService = $container->get(BooService::class);

        return new GetChatHistoryAction($omniChatService, $booService);
    }
}
