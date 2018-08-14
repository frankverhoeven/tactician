<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\CommandHandlerMapper;

use Psr\Container\ContainerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class CombinedConfigAndReplacingMapperFactory
{
    /**
     * @param ContainerInterface $container
     * @return CombinedMapper
     */
    public function __invoke(ContainerInterface $container): CombinedMapper
    {
        return new CombinedMapper([
            $container->get(ConfigMapper::class),
            new ReplaceCommandWithHandlerMapper(),
        ]);
    }
}
