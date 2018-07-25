<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Event;

/**
 * CommandEventInterface
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
interface CommandEventInterface
{
    /**
     * @return object
     */
    public function command(): object;
}
