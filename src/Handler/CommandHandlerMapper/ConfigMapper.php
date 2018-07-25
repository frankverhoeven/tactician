<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\CommandHandlerMapper;

use League\Tactician\Exception\MissingHandlerException;

/**
 * ConfigMapper
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ConfigMapper implements CommandHandlerMapperInterface
{
    /**
     * @var string[]
     */
    private $commandToHandlerMap;

    /**
     * @param string[] $commandToHandlerMap
     */
    public function __construct(array $commandToHandlerMap)
    {
        $this->commandToHandlerMap = $commandToHandlerMap;
    }

    /**
     * @inheritdoc
     */
    public function getHandlerNameForCommandName(string $commandName): string
    {
        if (!isset($this->commandToHandlerMap[$commandName])) {
            throw MissingHandlerException::forCommand($commandName);
        }

        return $this->commandToHandlerMap[$commandName];
    }
}
