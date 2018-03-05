<?php

namespace ETS\FZ223;

use ETS\Classifier\Entity\Status\ProcedureStatus;
use ETS\FZ223\WorkFlow\State;
use ETS\FZ223\WorkFlow\Procedure;


/**
 *
 * $wfProcedure = $sl->get(wf_procedure)
 * $wfProcedure->move($procedure, ProcedureStatus::STATUS_DRAFT);
 *
 */
return [
    'procedure' => [
        'class' => State\Procedure::CLASS_NAME,
        'states' => [
            ProcedureStatus::STATUS_DRAFT => Procedure\Draft::CLASS_NAME,
        ],
    ],
];