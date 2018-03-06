<?php

namespace ETS\PluginWorkFlow\State\Object;

use ETS\Classifier\Entity\Status\ProcedureStatus;

/**
 * Class Draft
 * @package ETS\PluginWorkFlow\Test\State\Object
 */
class Draft extends AbstractState
{

    const CLASS_NAME = 'ETS\PluginWorkFlow\Test\State\Object\Draft';

    /**
     * @return void
     */
    public function move()
    {
    }
}
