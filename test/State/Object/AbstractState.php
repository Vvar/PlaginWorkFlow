<?php

namespace ETS\PluginWorkFlow\Test\State\Object;


use  ETS\PluginWorkFlow\Test\Entity\TestEntity;

/**
 * Class AbstractState
 * @package ETS\PluginWorkFlow\Test\State\Object
 */
abstract class AbstractState
{
    /**
     * @var TestEntity
     */
    protected $testEntity;

    /**
     * AbstractState constructor.
     */
    public function __construct()
    {
    }
}