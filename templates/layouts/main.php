<?php

/**
 * @var \yii\web\View $this
 * @var string $content
 */

use yii\helpers\Html;

\yii\bootstrap\BootstrapAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>
<div class="container">
<?= $content ?>
</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>