<?php

namespace ETS\FZ223\WorkFlow\State\ServiceLocator;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ETS\FZ223\Options\ModuleOptions;
use ETS\FZ223\Service\Event\ProcedureEventService;
use Zend\EventManager\AbstractListenerAggregate;

/**
 * Class AbstractFactoryState
 * @package ETS\FZ223\WorkFlow\State\ServiceLocator
 */
class AbstractFactoryState implements AbstractFactoryInterface
{
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
     * @return AbstractListenerAggregate
     * @throws \Exception
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $packetName = substr_replace($requestedName, '', 0, strlen($this->getAlias()) + 1);
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get('ETS\FZ223\Options\ModuleOptions');
        $eventListener = $moduleOptions->getEventListener();

        if (!array_key_exists($packetName, $eventListener)) {
            throw new \Exception("Пакет \{{$packetName}\} не описан в конфиге.");
        }

        $stateClass = isset($eventListener[$packetName]['class']) ? $eventListener[$packetName]['class'] : null;

        $state = $serviceLocator->get($stateClass);

        return $state;
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
}