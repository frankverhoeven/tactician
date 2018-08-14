<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Handler\Middleware;

use FrankVerhoeven\Tactician\Handler\Middleware\EventManagerMiddleware;
use FrankVerhoeven\Tactician\Handler\Middleware\EventManagerMiddlewareFactory;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Zend\EventManager\EventManagerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class EventManagerMiddlewareFactoryTest extends TestCase
{
    public function testCreatesEventManagerMiddleware(): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->expects(self::once())
            ->method('get')
            ->with(EventManagerInterface::class)
            ->willReturn($this->createMock(EventManagerInterface::class));

        $factory = new EventManagerMiddlewareFactory();

        self::assertInstanceOf(EventManagerMiddleware::class, $factory($container));
    }
}
