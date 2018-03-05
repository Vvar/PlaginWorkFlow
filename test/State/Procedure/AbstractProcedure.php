<?php

namespace ETS\FZ223\WorkFlow\Procedure;

use ETS\Classifier\Repository\Status\ProcedureStatusRepository;
use ETS\FZ223\Entity\Procedure\Procedure;
use ETS\FZ223\State\ProcedureInterface;

/**
 * Class AbstractProcedure
 * @package ETS\FZ223\State\Procedure
 */
abstract class AbstractProcedure implements ProcedureInterface
{
    /**
     * @var Procedure
     */
    protected $procedure;

    /**
     * @var ProcedureStatusRepository
     */
    protected $procedureStatusRepository;

    /**
     * AbstractProcedure constructor.
     * @param \ETS\Common\Procedure\Entity\ProcedureInterface $procedure
     * @param ProcedureStatusRepository $procedureStatusRepository
     */
    public function __construct(
        \ETS\Common\Procedure\Entity\ProcedureInterface $procedure,
        ProcedureStatusRepository $procedureStatusRepository
    ) {
        $this->procedure = $procedure;
        $this->procedureStatusRepository = $procedureStatusRepository;
    }
}