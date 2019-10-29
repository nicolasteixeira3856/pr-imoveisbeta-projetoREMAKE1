<?php

declare(strict_types=1);

namespace App\Http\Action;

use App\Application\Service\HomeService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;


class HomeAction implements RequestHandlerInterface
{
    /**
     * @var TemplateRendererInterface|null
     */
    private $template;

    /**
     * @var HomeService
     */
    private $service;

    public function __construct(HomeService $service, ?TemplateRendererInterface $template = null)
    {
        $this->template = $template;
        $this->service = $service;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $this->template->addPath('src/App/Application/Templates/app');
        return new HtmlResponse($this->template->render('home.html.twig'));
    }
}
