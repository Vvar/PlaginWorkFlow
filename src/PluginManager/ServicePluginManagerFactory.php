<?php

namespace ETS\PluginWorkFlow\PluginManager;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

/**
 * Class ServicePluginManagerFactory
 * @package ETS\PluginWorkFlow\PluginManager
 */
class ServicePluginManagerFactory extends AbstractPluginManagerFactory
{
    const CLASS_NAME = 'ETS\PluginWorkFlow\PluginManager\ServicePluginManagerFactory';

    const PLUGIN_MANAGER_CLASS = 'ETS\PluginWorkFlow\PluginManager\ServicePluginManager';
}
