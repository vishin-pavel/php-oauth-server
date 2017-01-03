<?php
return [
    'settings' => [
        'displayErrorDetails' => true,
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
        'controllers' => [
        ],
        'requiredFields' => [
            'Controllers\ZendeskController:createTicket' => [
                'requiredFields' => ['subject', 'comment']
            ]
        ],
        'zendesk' => [
            'subdomain' => 'shtrafy-gibdd',
            'username' => 'denis.kislukhin@gmail.com',
            'token' => 'YYoE6GENfvjS3mL0n5Od8FUt7OkAym9jHo0FJzdR'
        ]
    ],
];