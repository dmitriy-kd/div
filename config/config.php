<?php

return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/packages/framework.php'),
    require(__DIR__ . '/packages/debug.php'),
    require(__DIR__ . '/services.php'),
    require(__DIR__ . '/routes.php')
);
