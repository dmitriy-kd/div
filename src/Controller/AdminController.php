<?php

namespace App\Controller;

use Yii;
use yii\web\Controller;
use App\Controller\Behaviors\AccessBehavior;
use App\Models\Feedback;
use App\Models\FeedbackSearch;
use yii\data\ActiveDataProvider;

class AdminController extends Controller
{

    public function behaviors()
    {
        return [
            AccessBehavior::className()
        ];
    }

    public function actionIndex()
    {
        /*$query = Feedback::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ]
        ]);*/

        $searchModel = new FeedbackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'feedbackProvider' => $dataProvider
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {

            if ($model->load(Yii::$app->request->post())) {

                if ($model->validate()) {
                    if ($model->save()) {

                        Yii::$app->session->setFlash('success', 'Изменение прошло успешно');
                        return $this->redirect(['index']);
                    }
                } else {
                    $errors = $model->errors;
                    Yii::$app->session->setFlash('danger', $errors);
                    return $this->refresh();
                }

            } else {

                Yii::$app->session->setFlash('warning', 'Произошла ошибка, попробуйте позднее');
                return $this->refresh();
            }
        }

        return $this->render('update', [
           'model' => $model
        ]);

    }

    /**
     * Finds the Feedback model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Feedback the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     **/
    protected function findModel($id)
    {
        if (($model = Feedback::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}