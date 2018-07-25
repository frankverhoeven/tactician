<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\CommandHandlerMapper;

use League\Tactician\Exception\MissingHandlerException;

/**
 * CombinedMapper
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class CombinedMapper implements CommandHandlerMapperInterface
{
    /**
     * @var CommandHandlerMapperInterface[]
     */
    private $commandHandlerMappers;

    /**
     * @param CommandHandlerMapperInterface[] $commandHandlerMappers List of mappers that are executed in the order in
     *                                                               which they are provided. First handler name that
     *                                                               is found will be used.
     */
    public function __construct(array $commandHandlerMappers)
    {
        $this->commandHandlerMappers = \array_map(
            function (CommandHandlerMapperInterface $commandHandlerMapper) {
                return $commandHandlerMapper;
            },
            $commandHandlerMappers
        );
    }

    /**
     * @inheritdoc
     */
    public function getHandlerNameForCommandName(string $commandName): string
    {
        $handlerName = null;

        foreach ($this->commandHandlerMappers as $commandHandlerMapper) {
            try {
                $handlerName = $commandHandlerMapper->getHandlerNameForCommandName($commandName);
                break;
            } catch (MissingHandlerException $exception) {
            }
        }

        if (null === $handlerName) {
            throw MissingHandlerException::forCommand($commandName);
        }

        return $handlerName;
    }
}
