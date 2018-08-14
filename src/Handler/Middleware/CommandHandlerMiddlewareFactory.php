<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\Middleware;

use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\CommandNameExtractor;
use League\Tactician\Handler\Locator\HandlerLocator;
use League\Tactician\Handler\MethodNameInflector\MethodNameInflector;
use Psr\Container\ContainerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class CommandHandlerMiddlewareFactory
{
    /**
     * @param ContainerInterface $container
     * @return CommandHandlerMiddleware
     */
    public function __invoke(ContainerInterface $container): CommandHandlerMiddleware
    {
        return new CommandHandlerMiddleware(
            $container->get(CommandNameExtractor::class),
            $container->get(HandlerLocator::class),
            $container->get(MethodNameInflector::class)
        );
    }
}
