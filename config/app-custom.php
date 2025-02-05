<?php

return [
    'app_user_admin' => [
        'name' => env('APP_ADMIN_NAME', 'SIPTELCO'),
        'username' => env('APP_ADMIN_USERNAME', 'siptelco'),
        'email' => env('APP_ADMIN_EMAIL', 'info@siptelco.co'),
        'password' => env('APP_ADMIN_PASSWORD', 'siptelco'),
        'is_admin' => env('APP_ADMIN_ROL_ADMIN', true),
        'is_active' => env('APP_ADMIN_ACTIVE', true)
    ]
];
