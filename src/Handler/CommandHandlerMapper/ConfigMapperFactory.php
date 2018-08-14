<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\CommandHandlerMapper;

use Psr\Container\ContainerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ConfigMapperFactory
{
    /**
     * @param ContainerInterface $container
     * @return ConfigMapper
     */
    public function __invoke(ContainerInterface $container): ConfigMapper
    {
        return new ConfigMapper(
            $container->get('config')['command_handlers'] ?? []
        );
    }
}
