<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician;

use FrankVerhoeven\Tactician\Handler\Middleware\EventManagerMiddleware;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use Psr\Container\ContainerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class CommandBusFactory
{
    /**
     * @param ContainerInterface $container
     * @return CommandBus
     */
    public function __invoke(ContainerInterface $container): CommandBus
    {
        return new CommandBus([
            $container->get(EventManagerMiddleware::class),
            $container->get(CommandHandlerMiddleware::class),
        ]);
    }
}
