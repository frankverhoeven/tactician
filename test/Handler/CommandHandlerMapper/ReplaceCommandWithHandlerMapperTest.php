<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Handler\CommandHandlerMapper;

use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\ReplaceCommandWithHandlerMapper;
use PHPUnit\Framework\TestCase;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ReplaceCommandWithHandlerMapperTest extends TestCase
{
    /**
     * @param string $commandName
     * @param string $handlerName
     *
     * @dataProvider commandNamesDataProvider
     */
    public function testGetHandlerNameForCommandName(string $commandName, string $handlerName): void
    {
        $mapper = new ReplaceCommandWithHandlerMapper();

        self::assertEquals($handlerName, $mapper->getHandlerNameForCommandName($commandName));
    }

    /**
     * @return array
     */
    public function commandNamesDataProvider(): array
    {
        return [
            ['Command', 'Handler'],
            ['/App/UpdateCommand', '/App/UpdateHandler'],
            ['/App/Command/Update', '/App/Handler/Update'],
            ['/App/Command/UpdateCommand', '/App/Handler/UpdateHandler'],
        ];
    }
}
