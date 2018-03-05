<?php

namespace ETS\FZ223\WorkFlow\State\ServiceLocator;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

/**
 * Class ServicePluginManagerFactory
 * @package ETS\FZ223\WorkFlow\State\ServiceLocator
 */
class ServicePluginManagerFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = 'ETS\FZ223\WorkFlow\Service\ServicePluginManager';

}
