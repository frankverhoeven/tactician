<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Handler\Middleware;

use FrankVerhoeven\Tactician\Event\CommandFailedEvent;
use FrankVerhoeven\Tactician\Event\CommandHandledEvent;
use FrankVerhoeven\Tactician\Event\CommandReceivedEvent;
use League\Tactician\Middleware;
use Zend\EventManager\EventManagerInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class EventManagerMiddleware implements Middleware
{
    /**
     * @var EventManagerInterface
     */
    private $eventManager;

    /**
     * @param EventManagerInterface $eventManager
     */
    public function __construct(EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    /**
     * @param object $command
     * @param callable $next
     * @return mixed
     * @throws \Throwable
     */
    public function execute($command, callable $next)
    {
        try {
            $this->eventManager->triggerEvent(new CommandReceivedEvent($command));

            $result = $next($command);

            $this->eventManager->triggerEvent(new CommandHandledEvent($command));

            return $result;
        } catch (\Throwable $exception) {
            $this->eventManager->triggerEvent(new CommandFailedEvent($command));

            throw $exception;
        }
    }
}
