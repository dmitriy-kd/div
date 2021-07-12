<?php

/**
 * @var \yii\web\View $this
 * @var \App\Models\Forms\FeedbackForm $feedbackModel
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use App\Assets\PhoneMaskAsset;
use App\Assets\BootstrapAsset;

$this->title = 'Обратная связь';

?>

<div class="row">
    <div class="col-lg-5">
	    <h3>Оставить заявку</h3>

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
        <?php
            $form = ActiveForm::begin([
                'id' => 'feedback-form',
                'options' => [
                    'class' => 'form-vertical'
                ]
            ]);
        ?>

        <?= $form->field($feedbackModel, 'customer', [
        		'inputOptions' => [
        				'maxlength' => 256,
			            'class' => 'form-control'
		        ]
        ])->label('ФИО'); ?>

        <?= $form->field($feedbackModel, 'phone', [
        		'inputOptions' => [
        				'required' => '',
			            'class' => 'form-control',
			            'data-type' => 'phone',
			            'autocomplete' => 'off'
		        ]
        ])->label('Телефон'); ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить обращение', [
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