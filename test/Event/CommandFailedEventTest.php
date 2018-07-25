<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Event;

use FrankVerhoeven\Tactician\Event\CommandFailedEvent;
use PHPUnit\Framework\TestCase;

final class CommandFailedEventTest extends TestCase
{
    public function testConstructor(): void
    {
        $event = new CommandFailedEvent($command = new \stdClass());

        self::assertSame($command, $event->command());
        self::assertEquals('command.failed', $event->getName());
    }
}
