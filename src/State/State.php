<?php

namespace ETS\PluginWorkFlow\State;

use ETS\PluginWorkFlow\State\Exception;
use ETS\PluginWorkFlow\PluginManager\ServicePluginManager;

/**
 * Class State
 * @package ETS\PluginWorkFlow\State
 */
class State
{

    /**
     * @var array
     */
    protected $states = [];

    /**
     * AbstractState constructor.
     * @param ServicePluginManager $servicePluginManager
     * @param array $states
     */
    public function __construct(
        ServicePluginManager $servicePluginManager,
        array $states
    ) {
        $this->servicePluginManager = $servicePluginManager;
        $this->states = $states;
    }

    /**
     * @param $object
     * @param $status
     * @throws \Exception
     */
    public function move($object, $status)
    {
        if (!array_key_exists($status, $this->states)) {
            throw new \Exception("Статус не найден", 500);
        }
        $state = $this->servicePluginManager->get($this->states[$status]);
        $state->move($object, $status);
    }

}