<?php

namespace App\Controller\Behaviors;

use Yii;
use yii\base\Behavior;
use App\Models\User;
use yii\web\Controller;

class AccessBehavior extends Behavior
{

    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'checkAccess'
        ];
    }

    public function checkAccess()
    {
        $user = new User();
        if (!$user->login('d.kim', '12345')) {
            echo 'Неверно указаны логин или пароль';
            die;
        }
    }

}