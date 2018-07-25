<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest;

use FrankVerhoeven\Tactician\CommandBusFactory;
use FrankVerhoeven\Tactician\Handler\Middleware\EventManagerMiddleware;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Middleware;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

final class CommandBusFactoryTest extends TestCase
{
    public function testCreatesConfigMapper(): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->expects(self::exactly(2))
            ->method('get')
            ->withConsecutive(
                [EventManagerMiddleware::class],
                [CommandHandlerMiddleware::class]
            )
            ->willReturn($this->createMock(Middleware::class));

        $factory = new CommandBusFactory();

        self::assertInstanceOf(CommandBus::class, $factory($container));
    }
}
