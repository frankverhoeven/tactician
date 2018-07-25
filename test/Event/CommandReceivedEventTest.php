<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Event;

use FrankVerhoeven\Tactician\Event\CommandReceivedEvent;
use PHPUnit\Framework\TestCase;

final class CommandReceivedEventTest extends TestCase
{
    public function testConstructor(): void
    {
        $event = new CommandReceivedEvent($command = new \stdClass());

        self::assertSame($command, $event->command());
        self::assertEquals('command.received', $event->getName());
    }
}
