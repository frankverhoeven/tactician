<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Handler\CommandHandlerMapper;

use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\ConfigMapper;
use League\Tactician\Exception\MissingHandlerException;
use PHPUnit\Framework\TestCase;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ConfigMapperTest extends TestCase
{
    public function testGetHandlerNameForCommandName(): void
    {
        $mapper = new ConfigMapper(['command' => 'handler']);

        self::assertEquals('handler', $mapper->getHandlerNameForCommandName('command'));
    }

    public function testGetHandlerNameForCommandNameException(): void
    {
        $this->expectException(MissingHandlerException::class);

        (new ConfigMapper([]))->getHandlerNameForCommandName('command');
    }
}
