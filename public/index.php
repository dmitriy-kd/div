<?php

use Symfony\Component\Dotenv\Dotenv;

$root = dirname(__DIR__);

require $root . '/vendor/autoload.php';

(new Dotenv(false))->loadEnv($root . '/.env');

defined('YII_DEBUG') or define('YII_DEBUG', (bool)$_SERVER['APP_DEBUG']);
defined('YII_ENV') or define('YII_ENV', $_SERVER['APP_ENV']);

require $root . '/vendor/yiisoft/yii2/Yii.php';

$config = yii\helpers\ArrayHelper::merge(
    require($root . '/config/config.php'),
    require($root . '/config/env/web/services.php')
);

(new yii\web\Application($config))->run();
