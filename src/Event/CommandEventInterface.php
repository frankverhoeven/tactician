<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician\Event;

use Zend\EventManager\EventInterface;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
interface CommandEventInterface extends EventInterface
{
    public const RECEIVED = '.received';
    public const HANDLED = '.handled';
    public const FAILED = '.failed';

    /**
     * @return object
     */
    public function command(): object;
}
