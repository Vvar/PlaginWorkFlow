<?php

namespace ETS\PluginWorkFlow;

use ETS\Classifier\Entity\Status\ProcedureStatus;

use ETS\PluginWorkFlow\State\Object\Draft;

/**
 *
 * $wfProcedure = $sl->get(wf_procedure)
 * $wfProcedure->move($procedure, ProcedureStatus::STATUS_DRAFT);
 *
 */
return [
    'test' => [
        'states' => [
            'draft' => Draft::CLASS_NAME,
        ]
    ],
];