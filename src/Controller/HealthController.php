<?php

declare(strict_types=1);

namespace App\Controller;

use yii\web;

class HealthController extends web\Controller
{
    public function actionIndex()
    {
        $this->response->format = web\Response::FORMAT_RAW;
        $this->response->headers->add('Content-Type', 'text/plain; charset=utf-8');
        $this->response->data = 'service is running';

        return $this->response;
    }
}
