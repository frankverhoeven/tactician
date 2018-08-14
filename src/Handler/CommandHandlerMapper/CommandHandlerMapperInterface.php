<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\CommandHandlerMapper;

use League\Tactician\Exception\MissingHandlerException;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
interface CommandHandlerMapperInterface
{
    /**
     * Retrieve the name of the command handler for the provided command name.
     *
     * @param string $commandName Command name
     * @return string Command handler name
     * @throws MissingHandlerException
     */
    public function getHandlerNameForCommandName(string $commandName): string;
}
