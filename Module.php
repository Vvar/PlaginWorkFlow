<?php

namespace ETS\PluginWorkFlow;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Listener\ServiceListenerInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\ModuleManagerInterface;
use ETS\PluginWorkFlow\PluginManager\ServicePluginManager;
use ETS\PluginWorkFlow\PluginManager\ServiceConfigProviderInterface;


/**
 * Class Module
 * @package ETS\PluginWorkFlow
 */
class Module implements
    InitProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{

    const CONFIG_KEY  = 'plugin-work-flow';

    /**
     * Initialize workflow
     *
     * @param  ModuleManagerInterface $manager
     * @return void
     * @throws \Exception
     */
    public function init(ModuleManagerInterface $manager)
    {
        if (!$manager instanceof ModuleManager) {
            $errMsg = sprintf('Module manager not implement %s', 'Zend\ModuleManager\ModuleManager');
            throw new \Exception($errMsg);
        }

        /** @var ServiceLocatorInterface $sm */
        $serviceManager = $manager->getEvent()->getParam('ServiceManager');
        if (!$serviceManager instanceof ServiceLocatorInterface) {
            $errMsg = sprintf('Service locator not implement %s', 'Zend\ServiceManager\ServiceLocatorInterface');
            throw new \Exception($errMsg);
        }

        /** @var ServiceListenerInterface $serviceListener */
        $serviceListener = $serviceManager->get('ServiceListener');
        if (!$serviceListener instanceof ServiceListenerInterface) {
            $errMsg = sprintf('ServiceListener not implement %s', 'Zend\ServiceManager\ServiceLocatorInterface');
            throw new \Exception($errMsg);
        }

        $serviceListener->addServiceManager(
            ServicePluginManager::CLASS_NAME,
            ServicePluginManager::CONFIG_KEY,
            ServiceConfigProviderInterface::CLASS_NAME,
            'getServiceConfig'
        );
    }

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return array_merge(
            include __DIR__ .'/config/module.config.php'
        );
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return include __DIR__ .'/config/service.config.php';
    }
}
