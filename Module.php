<?php

namespace ETS\PluginWorkFlow;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\EventManager\EventInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Listener\ServiceListenerInterface;
use ETS\PluginWorkFlow\Service\ServicePluginManager;
use ETS\PluginWorkFlow\Service\ServiceConfigProviderInterface;

/**
 * Class Module
 * @package ETS\PluginWorkFlow
 */
class Module implements
    BootstrapListenerInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{
    const CONFIG_KEY  = 'plugin-work-flow';

    /**
     * @param EventInterface | MvcEvent $e
     * @throws \Exception
     * @return void
     */
    public function onBootstrap(EventInterface $e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();
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

        $pluginWorkFlow = $serviceManager->get(Service\ServicePluginManager::CLASS_NAME);
        $stateObject = $pluginWorkFlow->get('object');

        $asd = 2;

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
