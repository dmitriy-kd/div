<?php

namespace App\Assets;

use yii\web\AssetBundle;

class PhoneMaskAsset extends AssetBundle
{
    public $basePath = '@js';
    public $baseUrl = '/js';
    public $css = [];
    public $js = [
        'https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js',
        'https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js',
        'maskPhone.js'
    ];
    public $depends = [];
}