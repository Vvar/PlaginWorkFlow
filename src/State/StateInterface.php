<?php

namespace ETS\PluginWorkFlow\State;

/**
 * Interface StateInterface
 * @package ETS\PluginWorkFlow\State
 */
interface StateInterface
{
    /**
     * @param $object
     * @param $status
     * @return mixed
     */
    public function move($object, $status);
}