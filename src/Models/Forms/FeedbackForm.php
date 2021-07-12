<?php

namespace App\Models\Forms;

use Yii;
use yii\base\Model;
use App\Models\Feedback;

class FeedbackForm extends Model
{
    const ON_MODERATION = 0;
    public $customer;
    public $phone;
    public $status;

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

    public function save()
    {
        $feedback = new Feedback();
        $feedback->customer = $this->customer;
        $feedback->phone = $this->phone;
        $feedback->status = static::ON_MODERATION;

        if ($feedback->save()) {
            return true;
        } else {
            return false;
        }
    }


}