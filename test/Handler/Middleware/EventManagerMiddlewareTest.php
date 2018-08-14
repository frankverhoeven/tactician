<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Handler\Middleware;

use FrankVerhoeven\Tactician\Event\CommandFailedEvent;
use FrankVerhoeven\Tactician\Event\CommandHandledEvent;
use FrankVerhoeven\Tactician\Event\CommandReceivedEvent;
use FrankVerhoeven\Tactician\Handler\Middleware\EventManagerMiddleware;
use PHPUnit\Framework\TestCase;
use Zend\EventManager\EventManagerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class EventManagerMiddlewareTest extends TestCase
{
    /**
     * @var EventManagerMiddleware
     */
    private $middleware;

    /**
     * @var EventManagerInterface
     */
    private $eventManager;

    protected function setUp()
    {
        $this->middleware = new EventManagerMiddleware(
            $this->eventManager = $this->createMock(EventManagerInterface::class)
        );
    }

    public function testExecute(): void
    {
        $command = new \stdClass();
        $next = $this->createPartialMock(\stdClass::class, ['__invoke']);

        $this->eventManager->expects(self::exactly(2))
            ->method('triggerEvent')
            ->withConsecutive(
                [new CommandReceivedEvent($command)],
                [new CommandHandledEvent($command)]
            );

        $next->expects(self::once())
            ->method('__invoke')
            ->with($command)
            ->willReturn('value');

        self::assertEquals('value', $this->middleware->execute($command, $next));
    }

    public function testExecuteFailed(): void
    {
        $command = new \stdClass();
        $next = $this->createPartialMock(\stdClass::class, ['__invoke']);

        $this->eventManager->expects(self::exactly(2))
            ->method('triggerEvent')
            ->withConsecutive(
                [new CommandReceivedEvent($command)],
                [new CommandFailedEvent($command)]
            );

        $next->expects(self::once())
            ->method('__invoke')
            ->with($command)
            ->willThrowException(new \Exception());

        $this->expectException(\Exception::class);

        $this->middleware->execute($command, $next);
    }
}
