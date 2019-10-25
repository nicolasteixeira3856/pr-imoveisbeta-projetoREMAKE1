<?php

declare(strict_types=1);

namespace App\Infrastructure\Container\Application\Factory\Action;

use App\Application\Service\CrmService;
use App\Application\Service\MercyService;
use App\Application\Service\OmniChatService;
use App\Http\Action\Attendance\CRM\GetCustomerDataByDocumentAction;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

class GetCustomerDataByDocumentActionFactory
{
    public function __invoke(ContainerInterface $container, $requestedService) : RequestHandlerInterface
    {
        $crmService = $container->get(CrmService::class);
        $omniChatService = $container->get(OmniChatService::class);

        $mercyService = $container->get(MercyService::class);

        return new GetCustomerDataByDocumentAction($crmService, $omniChatService, $mercyService);
    }
}
