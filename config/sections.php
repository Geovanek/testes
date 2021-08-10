<?php

return [
    'sections' => [
        'company' => [
            'layout' => 'company.layouts.company'
        ],
        'athlete' => [
            'layout' => 'athlete.layouts.athlete'
        ],
        'admin' => [
            'layout' => 'admin.layouts.admin'
        ],
        'front' => [
            'login' => [
                'App_Models_Admin' => [
                    'redirect' => '/admin/dashboard',
                    'guard' => 'admin_web',
                ],
                'App_Models_Coach' => [
                    'redirect' => '/company/coach',
                    'guard' => 'coach_web',
                ],
                'App_Models_Athlete' => [
                    'redirect' =>'/athlete/dashboard',
                    'guard' => 'athlete_web',
                ],
            ],
            'layout' => 'front.layouts.front',
        ]
    ]
];