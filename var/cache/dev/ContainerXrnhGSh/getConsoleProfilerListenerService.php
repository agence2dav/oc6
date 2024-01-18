<?php

namespace ContainerXrnhGSh;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsoleProfilerListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'console_profiler_listener' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\EventListener\ConsoleProfilerListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'EventListener'.\DIRECTORY_SEPARATOR.'ConsoleProfilerListener.php';

        $a = ($container->services['.container.private.profiler'] ?? self::get_Container_Private_ProfilerService($container));

        if (isset($container->privates['console_profiler_listener'])) {
            return $container->privates['console_profiler_listener'];
        }

        return $container->privates['console_profiler_listener'] = new \Symfony\Bundle\FrameworkBundle\EventListener\ConsoleProfilerListener($a, ($container->services['.virtual_request_stack'] ?? self::get_VirtualRequestStackService($container)), ($container->services['debug.stopwatch'] ??= new \Symfony\Component\Stopwatch\Stopwatch(true)), $container->getEnv('not:default:kernel.runtime_mode.web:'), ($container->services['router'] ?? self::getRouterService($container)));
    }
}
