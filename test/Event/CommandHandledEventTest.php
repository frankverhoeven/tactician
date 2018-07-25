<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Event;

use FrankVerhoeven\Tactician\Event\CommandHandledEvent;
use PHPUnit\Framework\TestCase;

final class CommandHandledEventTest extends TestCase
{
    public function testConstructor(): void
    {
        $event = new CommandHandledEvent($command = new \stdClass());

        self::assertSame($command, $event->command());
        self::assertEquals('command.handled', $event->getName());
    }
}
