<?php

namespace ETS\PluginWorkFlow\Options;


use Zend\Stdlib\AbstractOptions;

/**
 * Class ModuleOptions
 * @package ETS\PluginWorkFlow\Options
 */
class ModuleOptions extends AbstractOptions
{
    const CLASS_NAME = 'ETS\PluginWorkFlow\Options\ModuleOptions';

    /**
     * @var array
     */
    protected $state;

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
}
