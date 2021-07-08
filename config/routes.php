<?php

return [
    'defaultRoute' => 'default/index',
    // use [controllerNamespace] if need controller autoloading
    'controllerNamespace' => 'App\Controller',
    // use [controllerMap] for manual controller mapping instead [controllerNamespace]
    // 'controllerMap' => [
    //    'default' => 'App\Controller\DefaultController',
    //    'health' => 'App\Controller\HealthController',
    // ],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            // 'enableStrictParsing' => true,
            'showScriptName' => false,
            // 'rules' => [
            //    '<controller>/<action>' => '<controller>/<action>',
            //    '<controller>' => '<controller>',
            // ],
        ],
    ],
];
