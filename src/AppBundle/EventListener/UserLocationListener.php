<?php

namespace AppBundle\EventListener;

use AppBundle\Controller\DefaultController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class UserLocationListener
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        $controllerWithAction = $request->attributes->get('_controller');

        [$controller] = explode('::', $controllerWithAction);

        if ($controller === DefaultController::class) {
            return;
        }

        $this->logger->info(
            'User IP:{ip}, url: {url}',
            ['ip' => $request->getClientIp(), 'url' => $request->getPathInfo()]
        );
    }
}
