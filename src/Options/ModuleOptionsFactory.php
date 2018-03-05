<?php

namespace ETS\PluginWorkFlow\Options;

use ETS\PluginWorkFlow\Module;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ModuleOptionsFactory
 * @package ETS\PluginWorkFlow\Options
 */
class ModuleOptionsFactory implements FactoryInterface
{
    const CLASS_NAME = 'ETS\PluginWorkFlow\Options\ModuleOptionsFactory';

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $config = array_key_exists(Module::CONFIG_KEY, $config) ? $config[Module::CONFIG_KEY] : [];
        return new ModuleOptions($config);
    }
}
