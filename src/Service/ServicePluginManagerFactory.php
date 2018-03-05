<?php

namespace ETS\PluginWorkFlow\Service;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

/**
 * Class ServicePluginManagerFactory
 * @package ETS\FZ223\WorkFlow\State\ServiceLocator
 */
class ServicePluginManagerFactory extends AbstractPluginManagerFactory
{
    const CLASS_NAME = 'ETS\PluginWorkFlow\Service\ServicePluginManagerFactory';

    const PLUGIN_MANAGER_CLASS = 'ETS\PluginWorkFlow\Service\ServicePluginManager';
}
