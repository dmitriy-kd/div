<?php

namespace App\Models;

use Yii;
use yii\web\IdentityInterface;

class User implements IdentityInterface
{
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    /**
     * @param $login
     * @param $pass
     * @return bool
     */
    public function login($login, $pass)
    {
        // $login = trim(htmlspecialchars(Yii::$app->request->get('login')));
        // $pass = trim(htmlspecialchars(Yii::$app->request->get('pass')));

        if (!empty($login) && !empty($pass)) {

            if (($_SERVER['APP_USER'] === (string) $login) && ($_SERVER['APP_PASS'] === (string) $pass)) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }
}