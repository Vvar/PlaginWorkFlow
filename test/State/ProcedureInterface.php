<?php

namespace ETS\FZ223\State;

use ETS\Classifier\Repository\Status\ProcedureStatusRepository;

/**
 * Interface ProcedureInterface
 * @package ETS\FZ223\State
 */
interface ProcedureInterface
{
    /**
     * ProcedureInterface constructor.
     * @param \ETS\Common\Procedure\Entity\ProcedureInterface $procedure
     * @param ProcedureStatusRepository $procedureStatusRepository
     */
    public function __construct(
        \ETS\Common\Procedure\Entity\ProcedureInterface $procedure,
        ProcedureStatusRepository $procedureStatusRepository
    );
}
