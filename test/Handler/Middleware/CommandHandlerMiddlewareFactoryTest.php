<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Handler\Middleware;

use FrankVerhoeven\Tactician\Handler\Middleware\CommandHandlerMiddlewareFactory;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\CommandNameExtractor;
use League\Tactician\Handler\Locator\HandlerLocator;
use League\Tactician\Handler\MethodNameInflector\MethodNameInflector;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class CommandHandlerMiddlewareFactoryTest extends TestCase
{
    public function testCreatesCommandHandlerMiddleware(): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->expects(self::exactly(3))
            ->method('get')
            ->withConsecutive(
                [CommandNameExtractor::class],
                [HandlerLocator::class],
                [MethodNameInflector::class]
            )
            ->willReturnOnConsecutiveCalls(
                $this->createMock(CommandNameExtractor::class),
                $this->createMock(HandlerLocator::class),
                $this->createMock(MethodNameInflector::class)
            );

        $factory = new CommandHandlerMiddlewareFactory();

        self::assertInstanceOf(CommandHandlerMiddleware::class, $factory($container));
    }
}
