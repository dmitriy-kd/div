<?php

return [
    'components' => [
        'request' => [
            'cookieValidationKey' => $_SERVER['APP_SECRET'] ?? '',
        ],
        'user' => [
            'identityClass' => 'App\Models\User'
        ]
    ]
];
