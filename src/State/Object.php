<?php

namespace ETS\PluginWorkFlow\State;

use ETS\Classifier\Entity\Status\ProcedureStatus;
use ETS\PluginWorkFlow\Service\ServicePluginManager;

/**
 * Class Object
 * @package ETS\PluginWorkFlow\State
 */
class Object
{
    /**
     * @var array
     */
    protected $states = [];

    /**
     * @var ServicePluginManager
     */
    protected $servicePluginManager;

    /**
     * Object constructor.
     * @param $servicePluginManager
     */
    public function __construct(
        ServicePluginManager $servicePluginManager,
        $states
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
            throw new \Exception("Статус не найден");
        }
        $state = $this->servicePluginManager->get($this->states[$status]);
        $state->move($object);
    }
}