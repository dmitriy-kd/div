<?php

namespace App\Controller;

use Yii;
use yii\web;
use App\Models\Forms\FeedbackForm;

class DefaultController extends web\Controller
{
    public function actionIndex()
    {
        $feedbackModel = new FeedbackForm();

        if (Yii::$app->request->isPost) {

            if ($feedbackModel->load(Yii::$app->request->post()) && $feedbackModel->validate()) {

                if ($feedbackModel->save()) {
                    Yii::$app->session->setFlash('success', 'Обращение отправлено');
                } else {
                    Yii::$app->session->setFlash('warning', 'Произошла ошибка, попробуйте позже');
                }

                return $this->refresh();

            } else {

                $errors = $feedbackModel->errors;
                Yii::$app->session->setFlash('danger', $errors);
                return $this->refresh();
            }

        }

        return $this->render('index', [
            'feedbackModel' => $feedbackModel
        ]);
    }
}
