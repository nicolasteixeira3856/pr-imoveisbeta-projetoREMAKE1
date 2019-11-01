<?php
declare(strict_types=1);

namespace App\Http\Action\User;

use App\Application\Service\UserService;
use App\Infrastructure\Container\Application\Action\MultipleFunctionAction;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Server\MiddlewareInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserAction extends MultipleFunctionAction implements MiddlewareInterface
{
    /** @var TemplateRendererInterface  */
    private $template;

    /** @var UserService  */
    private $service;

    public function __construct(
        UserService $service,
        TemplateRendererInterface $template
    ) {

        $this->template = $template;
        $this->service = $service;
    }

    protected function get()
    {
        $this->template->addPath('src/App/Application/Templates/app');
        return new HtmlResponse($this->template->render('login-register-form.html.twig'));
    }
}
