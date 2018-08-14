<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Handler\CommandHandlerMapper;

use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\ConfigMapper;
use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\ConfigMapperFactory;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ConfigMapperFactoryTest extends TestCase
{
    public function testCreatesConfigMapper(): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->expects(self::once())
            ->method('get')
            ->with('config')
            ->willReturn(['command_handlers' => []]);

        $factory = new ConfigMapperFactory();

        self::assertInstanceOf(ConfigMapper::class, $factory($container));
    }
}
