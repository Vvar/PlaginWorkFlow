<?php

namespace ETS\PluginWorkFlow\Test\State;

use ETS\PluginWorkFlow\Test\Entity\TestEntity;
use ETS\Classifier\Repository\Status\ProcedureStatusRepository;
use ETS\Common\Procedure\State\StateInterface;

/**
 * Class Object
 * @package ETS\PluginWorkFlow\Test\State
 */
class Object
{
    const CLASS_NAME = 'ETS\PluginWorkFlow\Test\State\Object';

    /**
     * @var array
     */
    protected $states = [];

    /**
     * @var ProcedureStatusRepository
     */
    protected $procedureStatusRepository;

    /**
     * Procedure constructor.
     * @param array $states
     */
    public function __construct(array $states = [])
    {
        $this->states = $states;
    }

    /**
     * @param TestEntity $procedure
     * @param StateInterface|string $state
     */
    public function move(TestEntity $procedure, $state)
    {

        if (is_string($state)) {
            $state = new $state($procedure, $this->procedureStatusRepository);
        }

        $state->transition();
    }
}
