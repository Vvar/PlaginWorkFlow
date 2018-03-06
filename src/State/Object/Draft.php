<?php

namespace ETS\PluginWorkFlow\State\Object;

use ETS\PluginWorkFlow\State\Entity\TestEntity;
use ETS\PluginWorkFlow\State\StateInterface;

/**
 * Class Draft
 * @package ETS\PluginWorkFlow\Test\State\Object
 */
class Draft implements StateInterface
{

    const CLASS_NAME = 'ETS\PluginWorkFlow\Test\State\Object\Draft';

    public function __construct()
    {

    }

    public function move($object, $status)
    {
        if (!$object instanceof TestEntity) {
            throw new \Exception("", 500);
        }

        $object->setStatus($status);
    }
}
