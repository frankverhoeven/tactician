<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest;

use FrankVerhoeven\Tactician\ConfigProvider;
use PHPUnit\Framework\TestCase;

/**
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ConfigProviderTest extends TestCase
{
    public function testProvidesConfig(): void
    {
        $provider = new ConfigProvider();

        self::assertInternalType('array', $provider());
    }
}
