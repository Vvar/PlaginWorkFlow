<?php

namespace ETS\PluginWorkFlow\Service;

/**
 * Interface ServiceConfigProviderInterface
 * @package ETS\PluginWorkFlow\Service
 */
interface ServiceConfigProviderInterface
{
    const CLASS_NAME = 'ETS\PluginWorkFlow\Service\ServiceConfigProviderInterface';

    /**
     * @return array
     */
    public function getServiceConfig();
}
