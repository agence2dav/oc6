<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOYs5xiK\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOYs5xiK/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerOYs5xiK.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerOYs5xiK\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerOYs5xiK\App_KernelDevDebugContainer([
    'container.build_hash' => 'OYs5xiK',
    'container.build_id' => 'a4967cc2',
    'container.build_time' => 1708964407,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerOYs5xiK');
