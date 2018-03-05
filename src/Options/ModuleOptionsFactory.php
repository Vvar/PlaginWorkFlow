<?php

namespace ETS\FZ223\State\Options;

use ETS\ActiveUser\Module;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ModuleOptionsFactory
 * @package ETS\FZ223\State\Options
 */
class ModuleOptionsFactory implements FactoryInterface
{
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
