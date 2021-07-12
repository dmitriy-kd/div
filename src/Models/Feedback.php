<?php

namespace App\Models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;


class Feedback extends ActiveRecord
{
    public static function tableName()
    {
        return 'feedback';
    }

    public function rules()
    {
        return [
            ['customer', 'string', 'max' => 256],
            ['phone', 'required'],
            ['phone', function($attribute, $params) {
                if (!preg_match('#^((7|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$#', $this->$attribute)) {
                    $this->addError($attribute, 'Телефон должен соответствовать формату +7(999)999-99-99');
                }
            }],
            ['status', 'default']
        ];
    }
}