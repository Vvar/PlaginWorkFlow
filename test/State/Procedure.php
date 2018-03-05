<?php

namespace ETS\FZ223\WorkFlow\State;

use ETS\Classifier\Repository\Status\ProcedureStatusRepository;
use ETS\Common\Procedure\State\StateInterface;
use ETS\FZ223\Entity\Procedure\Procedure as ProcedureEntity;

/**
 * Class Procedure
 * @package ETS\FZ223\WorkFlow\State
 */
class Procedure
{
    const CLASS_NAME = 'ETS\FZ223\WorkFlow\State\Procedure';

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
     * @param ProcedureEntity $procedure
     * @param StateInterface|string $state
     */
    public function move(ProcedureEntity $procedure, $state)
    {

        if (is_string($state)) {
            $state = new $state($procedure, $this->procedureStatusRepository);
        }

        $state->transition();
    }
}
