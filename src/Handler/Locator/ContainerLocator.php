<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\Locator;

use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CommandHandlerMapperInterface;
use League\Tactician\Handler\Locator\HandlerLocator;
use Psr\Container\ContainerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ContainerLocator implements HandlerLocator
{
    /**
     * @var CommandHandlerMapperInterface
     */
    private $commandHandlerMapper;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param CommandHandlerMapperInterface $commandHandlerMapper
     * @param ContainerInterface $container
     */
    public function __construct(
        CommandHandlerMapperInterface $commandHandlerMapper,
        ContainerInterface $container
    ) {
        $this->commandHandlerMapper = $commandHandlerMapper;
        $this->container = $container;
    }

    /**
     * @inheritdoc
     */
    public function getHandlerForCommand($commandName)
    {
        return $this->container->get(
            $this->commandHandlerMapper->getHandlerNameForCommandName($commandName)
        );
    }
}
