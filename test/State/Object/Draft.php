<?php

namespace ETS\PluginWorkFlow\Test\State\Object;

use ETS\Classifier\Entity\Status\ProcedureStatus;
use ETS\Common\Procedure\State\StateInterface;

/**
 * Class Draft
 * @package ETS\PluginWorkFlow\Test\State\Object
 */
class Draft extends AbstractState implements StateInterface
{

    const CLASS_NAME = 'ETS\PluginWorkFlow\Test\State\Object\Draft';

    /**
     * @return void
     */
    public function transition()
    {

    }
}
