<?php

namespace ETS\PluginWorkFlow;


use ETS\PluginWorkFlow\Options;
use ETS\PluginWorkFlow\PluginManager;


return [
    'aliases' => [
        'workFlowPluginManager' => PluginManager\ServicePluginManager::CLASS_NAME,
    ],

    'invokables' => [
    ],

    'factories' => [
        Options\ModuleOptions::CLASS_NAME                   => Options\ModuleOptionsFactory::CLASS_NAME,
        PluginManager\ServicePluginManager::CLASS_NAME      => PluginManager\ServicePluginManagerFactory::CLASS_NAME,
    ],

    'initializers' => [
    ],
];
