<?php

namespace ETS\PluginWorkFlow\PluginManager;

use ETS\PluginWorkFlow\State\AbstractState;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;

/**
 * Class ServicePluginManager
 * @package ETS\PluginWorkFlow\PluginManager
 */
class ServicePluginManager extends AbstractPluginManager
{
    const CLASS_NAME = 'ETS\PluginWorkFlow\PluginManager\ServicePluginManager';
    
    /**
     * Имя секции в конфига приложения отвечающей за настройки менеджера
     *
     * @var string
     */
    const CONFIG_KEY = 'workFlowPlugin';

    /**
     * Validate the plugin
     *
     * Checks that the filter loaded is either a valid callback or an instance
     * of FilterInterface.
     *
     * @param  mixed $plugin
     * @return void
     * @throws Exception\RuntimeException if invalid
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof AbstractState) {
            return;
        }

        throw new Exception\RuntimeException(sprintf(
            'Plugin of type %s is invalid; must implement %s',
            (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
            'AbstractState'
        ));
    }
}