<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Event;

use Zend\EventManager\Event;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class CommandReceivedEvent extends Event implements CommandEventInterface
{
    use CommandEventTrait;

    /**
     * @param object $command
     */
    public function __construct(object $command)
    {
        $this->command = $command;

        parent::__construct(\get_class($command) . '.received');
    }
}
