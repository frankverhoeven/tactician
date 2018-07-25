<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\CommandHandlerMapper;

/**
 * ReplaceCommandWithHandlerMapper
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ReplaceCommandWithHandlerMapper implements CommandHandlerMapperInterface
{
    /**
     * @inheritdoc
     */
    public function getHandlerNameForCommandName(string $commandName): string
    {
        return \str_replace('Command', 'Handler', $commandName);
    }
}
