<?php

namespace ETS\PluginWorkFlow;

use ETS\Classifier\Entity\Status\ProcedureStatus;
use ETS\PluginWorkFlow\Test\State\Object;

/**
 *
 * $wfProcedure = $sl->get(wf_procedure)
 * $wfProcedure->move($procedure, ProcedureStatus::STATUS_DRAFT);
 *
 */
return [
    'object' => [
        'class' => Object::CLASS_NAME,
        'states' => [
            'draft' => Object\Draft::CLASS_NAME,
        ],
    ],
];