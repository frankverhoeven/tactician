<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\Locator;

use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CommandHandlerMapperInterface;
use Psr\Container\ContainerInterface;

/**
 * ContainerLocatorFactory
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ContainerLocatorFactory
{
    /**
     * @param ContainerInterface $container
     * @return ContainerLocator
     */
    public function __invoke(ContainerInterface $container): ContainerLocator
    {
        return new ContainerLocator(
            $container->get(CommandHandlerMapperInterface::class),
            $container
        );
    }
}
