<?php

namespace ETS\PluginWorkFlow;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Listener\ServiceListenerInterface;

/**
 * Class Module
 * @package ETS\FZ223\WorkFlow
 */
class Module implements
    BootstrapListenerInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{
    const CONFIG_KEY  = 'ets-fz223-state';


    /**
     * @param EventInterface $e
     * @throws \Exception
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
            'ETS\DeepCopy\Service\ServicePluginManager',
            ServicePluginManager::CONFIG_KEY,
            'ETS\DeepCopy\Service\ServiceConfigProviderInterface',
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
