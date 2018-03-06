<?php

namespace ETS\PluginWorkFlow\State\Object;


use  ETS\PluginWorkFlow\Test\Entity\TestEntity;

/**
 * Class AbstractState
 * @package ETS\PluginWorkFlow\State\Object
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

    /**
     * Смена статуса
     * @return mixed
     */
    abstract public function move();
}