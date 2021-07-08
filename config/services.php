<?php

return [
    'components' => [
        'assetManager' => [
            'linkAssets' => true,
            'appendTimestamp' => true,
        ],
        'cache' => [
            'class' => '\yii\caching\DummyCache',
        ],
        'schemaCache' => [
            'class' => '\yii\caching\DummyCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlite:@app/var/db.sqlite',
        ],
    ],
];
