<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Handler\Locator;

use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CommandHandlerMapperInterface;
use FrankVerhoeven\Tactician\Handler\Locator\ContainerLocator;
use FrankVerhoeven\Tactician\Handler\Locator\ContainerLocatorFactory;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ContainerLocatorFactoryTest extends TestCase
{
    public function testCreatesContainerLocator(): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->expects(self::once())
            ->method('get')
            ->with(CommandHandlerMapperInterface::class)
            ->willReturn($this->createMock(CommandHandlerMapperInterface::class));

        $factory = new ContainerLocatorFactory();

        self::assertInstanceOf(ContainerLocator::class, $factory($container));
    }
}
