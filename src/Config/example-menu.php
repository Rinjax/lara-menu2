<?php

return [
    [
        'type' => 'dropdown',
        'text' => 'cool menu',
        'classes' => [],
        'styles' => [
            'padding' => '1rem'
        ],
        'permissions' => [
            'allow' => '',
            'deny' => ''
        ],
        'roles' => [
          'allow' => 'admin|dev',
          'deny' => ''
        ],
        'list' => [
            ['type' => 'link', 'text' => 'click this', 'route' => 'package.route.name', 'classes' => []],
            ['type' => 'link', 'text' => 'click this', 'route' => 'package.route.name', 'classes' => []],
            [
                'type' => 'link',
                'text' => 'click this',
                'route' => 'package.route.name',
                'classes' => [],
                'roles' => [
                    'allow' => 'admin|dev'
            ]
            ]
        ]
    ]
];