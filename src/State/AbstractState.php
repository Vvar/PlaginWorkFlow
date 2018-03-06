<?php

namespace ETS\PluginWorkFlow\State;

use ETS\PluginWorkFlow\State\Exception;
use ETS\PluginWorkFlow\PluginManager\ServicePluginManager;

/**
 * Class AbstractState
 * @package ETS\PluginWorkFlow\State
 */
abstract class AbstractState
{
    protected $exceptionInvalid = 'Invalid object type passed.';

    /**
     * @var
     */
    protected $object;

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
        $this->setObject($object);

        if (!array_key_exists($status, $this->states)) {
            throw new \Exception("Статус не найден");
        }
        $state = $this->servicePluginManager->get($this->states[$status]);

        $state->move($object, $status);
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->objectInstanceOf($object);
        $this->object = $object;
    }

    abstract public function objectInstanceOf($object);
}