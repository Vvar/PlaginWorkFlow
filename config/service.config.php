<?php

namespace ETS\PluginWorkFlow;


use ETS\PluginWorkFlow\Options;
use ETS\PluginWorkFlow\Service;


return [
    'aliases' => [
    ],

    'invokables' => [

    ],

    'factories' => [
        Options\ModuleOptions::CLASS_NAME           => Options\ModuleOptionsFactory::CLASS_NAME,
        Service\ServicePluginManager::CLASS_NAME    => Service\ServicePluginManagerFactory::CLASS_NAME,
    ],

    'initializers' => [
    ],
];
