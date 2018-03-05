<?php

namespace ETS\PluginWorkFlow\Test\State\Object\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ETS\PluginWorkFlow\Test\State\Object\Draft;

/**
 * Class DraftFactory
 * @package ETS\PluginWorkFlow\Test\State\Object\Factory
 */
class DraftFactory implements FactoryInterface
{
    const CLASS_NAME = 'ETS\PluginWorkFlow\Test\State\Object\Factory\DraftFactory';

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        return new Draft();
    }
}
