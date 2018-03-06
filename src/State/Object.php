<?php

namespace ETS\PluginWorkFlow\State;

use ETS\PluginWorkFlow\State\Entity\TestEntity;

/**
 * Class Object
 * @package ETS\PluginWorkFlow\State
 */
class Object extends AbstractState
{
    /**
     * @param $object
     * @throws Exception\InvalidArgumentException
     */
    public function objectInstanceOf($object)
    {
        if (!$object instanceof TestEntity) {
            throw new Exception\InvalidArgumentException($this->exceptionInvalid, 500);
        }
    }
}