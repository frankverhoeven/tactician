<?php

declare(strict_types=1);

namespace FrankVerhoeven\Tactician;

use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CombinedConfigAndReplacingMapperFactory;
use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\CommandHandlerMapperInterface;
use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\ConfigMapper;
use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\ConfigMapperFactory;
use FrankVerhoeven\Tactician\Handler\CommandHandlerMapper\ReplaceCommandWithHandlerMapper;
use FrankVerhoeven\Tactician\Handler\Locator\ContainerLocatorFactory;
use FrankVerhoeven\Tactician\Handler\Middleware\CommandHandlerMiddlewareFactory;
use FrankVerhoeven\Tactician\Handler\Middleware\EventManagerMiddleware;
use FrankVerhoeven\Tactician\Handler\Middleware\EventManagerMiddlewareFactory;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\CommandNameExtractor\CommandNameExtractor;
use League\Tactician\Handler\Locator\HandlerLocator;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;
use League\Tactician\Handler\MethodNameInflector\MethodNameInflector;

/**
 * ConfigProvider
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'invokables' => [
                    CommandHandlerMapperInterface::class => ReplaceCommandWithHandlerMapper::class,
                    CommandNameExtractor::class => ClassNameExtractor::class,
                    MethodNameInflector::class => InvokeInflector::class,
                ],
                'factories' => [
                    CommandBus::class => CommandBusFactory::class,
                    CommandHandlerMapperInterface::class => CombinedConfigAndReplacingMapperFactory::class,
                    CommandHandlerMiddleware::class => CommandHandlerMiddlewareFactory::class,
                    ConfigMapper::class => ConfigMapperFactory::class,
                    EventManagerMiddleware::class => EventManagerMiddlewareFactory::class,
                    HandlerLocator::class => ContainerLocatorFactory::class,
                ],
            ],
        ];
    }
}
