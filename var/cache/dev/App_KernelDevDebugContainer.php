<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLLJxlYw\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLLJxlYw/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerLLJxlYw.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerLLJxlYw\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerLLJxlYw\App_KernelDevDebugContainer([
    'container.build_hash' => 'LLJxlYw',
    'container.build_id' => '0c80d408',
    'container.build_time' => 1707312991,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLLJxlYw');
