<?php

return [
    'id' => 'micro-app',
    'basePath' => dirname(__DIR__, 2),
    'viewPath' => '@app/templates/controllers',
    'layoutPath' => '@app/templates/layouts',
    'runtimePath' => '@app/var',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@App' => '@app',
    ],
];
