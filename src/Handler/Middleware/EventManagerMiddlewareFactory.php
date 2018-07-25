<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\Middleware;

use Psr\Container\ContainerInterface;
use Zend\EventManager\EventManagerInterface;

/**
 * EventManagerMiddlewareFactory
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class EventManagerMiddlewareFactory
{
    /**
     * @param ContainerInterface $container
     * @return EventManagerMiddleware
     */
    public function __invoke(ContainerInterface $container): EventManagerMiddleware
    {
        return new EventManagerMiddleware(
            $container->get(EventManagerInterface::class)
        );
    }
}
