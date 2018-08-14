<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Handler\CommandHandlerMapper;

use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CombinedConfigAndReplacingMapperFactory;
use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CombinedMapper;
use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CommandHandlerMapperInterface;
use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\ConfigMapper;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class CombinedConfigAndReplacingMapperFactoryTest extends TestCase
{
    public function testCreatesCombinedMapper(): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->expects(self::once())
            ->method('get')
            ->with(ConfigMapper::class)
            ->willReturn($this->createMock(CommandHandlerMapperInterface::class));

        $factory = new CombinedConfigAndReplacingMapperFactory();

        self::assertInstanceOf(CombinedMapper::class, $factory($container));
    }
}
