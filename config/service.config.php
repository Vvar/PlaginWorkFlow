<?php

namespace ETS\PlaginWorkFlow\State;


use ETS\FZ223\WorkFlow\Procedure;
use ETS\DeepCopy\Service\ServicePluginManager;

return [
    'aliases' => [

    ],

    'invokables' => [

    ],

    'factories' => [
        Procedure\Draft::CLASS_NAME => Procedure\Factory\DraftFactory::CLASS_NAME,
    ],

    'initializers' => [
    ],
];
