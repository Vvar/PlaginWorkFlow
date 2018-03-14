<?php

namespace ETS\PluginWorkFlow\Service;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\EventManager\AbstractListenerAggregate;
use ETS\PluginWorkFlow\Options\ModuleOptions;
use Zend\ServiceManager\AbstractPluginManager;
use ETS\PluginWorkFlow\State\State;
use ETS\PluginWorkFlow\PluginManager\ServicePluginManager;

/**
 * Class AbstractFactoryState
 * @package ETS\PluginWorkFlow\Service
 */
class AbstractFactoryState implements AbstractFactoryInterface
{
    const CLASS_NAME = 'ETS\PluginWorkFlow\Service\AbstractFactoryState';

    /**
     * Алиас
     * @var string
     */
    protected $alias = 'state';


    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {

        return strpos($requestedName, $this->getAlias() . '_') === 0;
    }


    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return State
     * @throws \Exception
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $packetName = substr_replace($requestedName, '', 0, strlen($this->getAlias()) + 1);

        $moduleOptions = $this->getModuleOptions($serviceLocator);

        $states = !empty($moduleOptions->getState()[$name]) ? $moduleOptions->getState()[$name] : null;

        if ($states === null) {
            throw new \Exception("States not found.", 500);
        }

        if (!$serviceLocator instanceof ServicePluginManager) {
            throw new \Exception('Invalid parameter type.', 500);
        }

        return new State($serviceLocator, $states);
    }


    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     * @return $this
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * @param $serviceLocator
     * @return ModuleOptions
     */
    protected function getModuleOptions($serviceLocator)
    {
        if ($serviceLocator instanceof AbstractPluginManager) {
            $serviceLocator = $serviceLocator->getServiceLocator();
        }
        return $serviceLocator->get(ModuleOptions::CLASS_NAME);
    }
}