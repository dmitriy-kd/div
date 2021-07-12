<?php

/**
 * @var \yii\web\View $this
 * @var \yii\data\DataProviderInterface $feedbackProvider
 */

use yii\grid\GridView;

$this->title = 'Консоль администратора';

?>

<h1>Admin console</h1>

<?php
if( Yii::$app->session->hasFlash('success') ):
    ?>

	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('success'); ?>
	</div>

<?php
elseif (Yii::$app->session->hasFlash('danger')):
    ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('success'); ?>
	</div>
<?php
elseif (Yii::$app->session->hasFlash('warning')):
    ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('warning'); ?>
	</div>
<?php
endif;
?>

<?= GridView::widget([
		'dataProvider' => $feedbackProvider,
		'filterModel' => $searchModel,
		'columns' => [
				'id',
				'customer',
				'phone',
				'status',
				[
					'class' => 'yii\grid\ActionColumn',
					'template' => '{update}'
				],
		]
]) ?>