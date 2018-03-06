<?php

namespace ETS\PluginWorkFlow\PluginManager;

/**
 * Interface ServiceConfigProviderInterface
 * @package ETS\PluginWorkFlow\PluginManager
 */
interface ServiceConfigProviderInterface
{
    const CLASS_NAME = 'ETS\PluginWorkFlow\PluginManager\ServiceConfigProviderInterface';

    /**
     * @return array
     */
    public function getServiceConfig();
}
