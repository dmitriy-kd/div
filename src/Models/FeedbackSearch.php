<?php

namespace App\Models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FeedbackSearch extends Feedback
{
    public function rules()
    {
        return [
            ['customer', 'string', 'max' => 256],
            ['phone', 'string'],
            ['status', 'integer']
        ];
    }

    public function search($params)
    {
        $query = Feedback::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'customer', $this->customer])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}