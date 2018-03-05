<?php

namespace ETS\PluginWorkFlow;

use ETS\PluginWorkFlow\Service\ServicePluginManager;
use ETS\PluginWorkFlow\State\AbstractFactoryState;

use ETS\PluginWorkFlow\Test\State\Object;

return [
    Module::CONFIG_KEY => [
        'state' => include __DIR__ . '/state.config.php',
    ],

    ServicePluginManager::CONFIG_KEY => [
        'abstract_factories' => [
            AbstractFactoryState::CLASS_NAME,
        ],

        'factories' => [
            Object\Draft::CLASS_NAME => Object\Factory\DraftFactory::CLASS_NAME
        ],
    ]
];
