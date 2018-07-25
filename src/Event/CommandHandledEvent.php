<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Event;

use Zend\EventManager\Event;

/**
 * CommandHandledEvent
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class CommandHandledEvent extends Event implements CommandEventInterface
{
    use CommandEventTrait;

    /**
     * @param object $command
     */
    public function __construct(object $command)
    {
        $this->command = $command;

        parent::__construct('command.handled');
    }
}
