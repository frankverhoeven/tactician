<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Event;

use FrankVerhoeven\Tactician\Event\CommandFailedEvent;
use PHPUnit\Framework\TestCase;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class CommandFailedEventTest extends TestCase
{
    public function testConstructor(): void
    {
        $event = new CommandFailedEvent($command = new \stdClass());

        self::assertSame($command, $event->command());
        self::assertEquals(\stdClass::class . '.failed', $event->getName());
    }
}
