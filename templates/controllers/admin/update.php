<?php

/**
 * @var \App\Models\Feedback $model
 * @var \yii\web\View $this
 */

use App\Models\Feedback;
use App\Assets\BootstrapAsset;
use App\Assets\PhoneMaskAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование записи';
?>
<h1>Редактирование заявки</h1>

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

<div class="row">
    <div class="col-lg-5">

        <?php
        $form = ActiveForm::begin([
            'id' => 'feedback-form',
            'options' => [
                'class' => 'form-vertical'
            ]
        ]);
        ?>

        <?= $form->field($model, 'customer', [
            'inputOptions' => [
                'maxlength' => 256,
                'class' => 'form-control',
            ]
        ])->label('ФИО'); ?>

        <?= $form->field($model, 'phone', [
            'inputOptions' => [
                'required' => '',
                'class' => 'form-control',
                'data-type' => 'phone',
                'autocomplete' => 'off',
            ]
        ])->label('Телефон'); ?>

	    <?= $form->field($model, 'status')->dropDownList([
	    		'0' => 'На модерации',
		        '1' => 'Обработана',
		        '2' => 'Отклонена'
	    ])->label('Статус заявки') ?>

        <div class="form-group">
            <?= Html::submitButton('Редактировать заявку', [
                'class' => 'btn btn-primary',
                'name' => 'send-feedback'
            ]) ?>
        </div>

        <?php
            ActiveForm::end();
        ?>

        <?php
            PhoneMaskAsset::register($this);
            BootstrapAsset::register($this);
        ?>
    </div>
</div>
