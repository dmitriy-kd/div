<?php

declare(strict_types=1);

namespace App\Controller;

use yii\web;

class DefaultController extends web\Controller
{
    public function actionIndex()
    {
        $data = [
            ['id' => 1, 'name' => 'name 1'],
            ['id' => 2, 'name' => 'name 2'],
            ['id' => 100, 'name' => 'name 100'],
        ];

        $provider = new \yii\data\ArrayDataProvider(
            [
                'allModels' => $data,
                'pagination' => [
                    'pageSize' => 10,
                ],
                'sort' => [
                    'attributes' => ['id', 'name'],
                ],
            ]
        );

        return $this->render('index', ['dataProvider' => $provider]);
    }
}
