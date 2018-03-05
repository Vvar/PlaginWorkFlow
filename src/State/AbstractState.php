<?php

namespace ETS\PluginWorkFlow\State;

use ETS\PluginWorkFlow\State\Exception;

/**
 * Class AbstractState
 * @package ETS\PluginWorkFlow\State
 */
class AbstractState
{
    /**
     * @var
     */
    protected $object;

    /**
     * @var array
     */
    protected $states = [];

    /**
     * Procedure constructor.
     * @param array $states
     * @throws Exception\InvalidArgumentException
     */
    public function __construct(
        array $states = []
    ) {
        if (!is_array($states)) {
            throw new Exception\InvalidArgumentException('Argument $states must be a array.', 500);
        }

        $this->states = $states;
    }

    /**
     * @param $object
     * @param $state
     * @throws Exception\InvalidArgumentException
     * @throws Exception\NotFoundException
     */
    public function move($object, $state)
    {
        if (!is_string($state)) {
            throw new Exception\InvalidArgumentException('Argument $state must be a string.', 500);
        }

        if (array_key_exists($state, $this->states)) {
            throw new Exception\NotFoundException('State not found.', 500);
        }

        if (!is_object($object)) {
            throw new Exception\InvalidArgumentException('Argument $object must be a object.', 500);
        }


    }
}