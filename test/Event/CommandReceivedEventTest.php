<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Event;

use FrankVerhoeven\Tactician\Event\CommandEventInterface;
use FrankVerhoeven\Tactician\Event\CommandReceivedEvent;
use PHPUnit\Framework\TestCase;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class CommandReceivedEventTest extends TestCase
{
    public function testConstructor(): void
    {
        $event = new CommandReceivedEvent($command = new \stdClass());

        self::assertSame($command, $event->command());
        self::assertEquals(\stdClass::class . CommandEventInterface::RECEIVED, $event->getName());
    }
}
