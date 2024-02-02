<?php

namespace ContainerLBLpOm0;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTrickServiceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Service\TrickService' shared autowired service.
     *
     * @return \App\Service\TrickService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Service'.\DIRECTORY_SEPARATOR.'TrickService.php';

        return $container->privates['App\\Service\\TrickService'] = new \App\Service\TrickService(($container->privates['App\\Repository\\TrickRepository'] ?? $container->load('getTrickRepositoryService')), ($container->services['doctrine.orm.default_entity_manager'] ?? self::getDoctrine_Orm_DefaultEntityManagerService($container)));
    }
}
