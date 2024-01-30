<?php

namespace ContainerXpgdcYs;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_TuUAVqBService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.tuUAVqB' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.tuUAVqB'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'trick' => ['privates', '.errored..service_locator.tuUAVqB.App\\Entity\\Trick', NULL, 'Cannot autowire service ".service_locator.tuUAVqB": it needs an instance of "App\\Entity\\Trick" but this type has been excluded in "config/services.yaml".'],
        ], [
            'trick' => 'App\\Entity\\Trick',
        ]);
    }
}