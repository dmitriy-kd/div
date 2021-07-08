<?php

/**
 * @var \yii\web\View $this
 * @var \yii\data\DataProviderInterface $dataProvider
 */

use yii\helpers\Html;

?>
<?= \yii\grid\GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
        ],
    ]
) ?>
