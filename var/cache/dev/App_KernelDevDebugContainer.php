<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLAxGPVu\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLAxGPVu/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerLAxGPVu.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerLAxGPVu\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerLAxGPVu\App_KernelDevDebugContainer([
    'container.build_hash' => 'LAxGPVu',
    'container.build_id' => '9e6b34a0',
    'container.build_time' => 1707827020,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLAxGPVu');
