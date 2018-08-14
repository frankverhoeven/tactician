<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Event;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
trait CommandEventTrait
{
    /**
     * @var object
     */
    protected $command;

    /**
     * @return object
     */
    public function command(): object
    {
        return $this->command;
    }
}
