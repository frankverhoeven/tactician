<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Handler\Locator;

use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CommandHandlerMapperInterface;
use FrankVerhoeven\Tactician\Handler\Locator\ContainerLocator;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ContainerLocatorTest extends TestCase
{
    /**
     * @var ContainerLocator
     */
    private $locator;

    /**
     * @var CommandHandlerMapperInterface
     */
    private $mapper;

    /**
     * @var ContainerInterface
     */
    private $container;

    protected function setUp()
    {
        $this->locator = new ContainerLocator(
            $this->mapper = $this->createMock(CommandHandlerMapperInterface::class),
            $this->container = $this->createMock(ContainerInterface::class)
        );
    }

    public function testGetHandlerForCommand(): void
    {
        $this->mapper->expects(self::once())
            ->method('getHandlerNameForCommandName')
            ->with($command = 'command')
            ->willReturn($handlerName = 'handlerName');

        $this->container->expects(self::once())
            ->method('get')
            ->with($handlerName)
            ->willReturn($handler = 'handler');

        self::assertEquals($handler, $this->locator->getHandlerForCommand($command));
    }
}
