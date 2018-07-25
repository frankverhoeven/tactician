<?php

declare(strict_types=1);

namespace FrankVerhoeven\TacticianTest\Handler\CommandHandlerMapper;

use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CombinedMapper;
use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CommandHandlerMapperInterface;
use League\Tactician\Exception\MissingHandlerException;
use PHPUnit\Framework\TestCase;

final class CombinedMapperTest extends TestCase
{
    /**
     * @var CombinedMapper
     */
    private $mapper;

    /**
     * @var CommandHandlerMapperInterface
     */
    private $innerMapper1;

    /**
     * @var CommandHandlerMapperInterface
     */
    private $innerMapper2;

    protected function setUp()
    {
        $this->mapper = new CombinedMapper([
            $this->innerMapper1 = $this->createMock(CommandHandlerMapperInterface::class),
            $this->innerMapper2 = $this->createMock(CommandHandlerMapperInterface::class),
        ]);
    }

    public function testHandlerFoundByFirstMapper(): void
    {
        $commandName = 'command';

        $this->innerMapper1->expects(self::once())
            ->method('getHandlerNameForCommandName')
            ->with($commandName)
            ->willReturn($handlerName = 'handler');

        $this->innerMapper2->expects(self::never())
            ->method('getHandlerNameForCommandName');

        self::assertEquals($handlerName, $this->mapper->getHandlerNameForCommandName($commandName));
    }

    public function testHandlerFoundBySecondMapper(): void
    {
        $commandName = 'command';

        $this->innerMapper1->expects(self::once())
            ->method('getHandlerNameForCommandName')
            ->with($commandName)
            ->willThrowException(MissingHandlerException::forCommand($commandName));

        $this->innerMapper2->expects(self::once())
            ->method('getHandlerNameForCommandName')
            ->with($commandName)
            ->willReturn($handlerName = 'handler');

        self::assertEquals($handlerName, $this->mapper->getHandlerNameForCommandName($commandName));
    }

    public function testHandlerNotFound(): void
    {
        $commandName = 'command';

        $this->innerMapper1->expects(self::once())
            ->method('getHandlerNameForCommandName')
            ->with($commandName)
            ->willThrowException(MissingHandlerException::forCommand($commandName));

        $this->innerMapper2->expects(self::once())
            ->method('getHandlerNameForCommandName')
            ->with($commandName)
            ->willThrowException(MissingHandlerException::forCommand($commandName));

        $this->expectException(MissingHandlerException::class);

        $this->mapper->getHandlerNameForCommandName($commandName);
    }
}
