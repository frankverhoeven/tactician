<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Event;

use Zend\EventManager\EventInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
interface CommandEventInterface extends EventInterface
{
    /**
     * @return object
     */
    public function command(): object;
}
