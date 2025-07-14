<?php

return [
    'debug' => true,
    'url' => 'https://test.modus-ge.ch',
    'panel' => [
        'install' => true,
    ],
    'api' => [
        'allowInsecure' => true,
        'authentication' => false,
    ],
    'hooks' => [
        'page.render:before' => function ($event) {
            header("Access-Control-Allow-Origin: *");
        }
    ],
    'routes' => [
        [
            'pattern' => 'api/home.json',
            'method' => 'GET',
            'action' => function () {
                // Retourne la page 1_home via l'API Kirby
                return kirby()->api()->call('pages/1_home');
            }
        ],
        [
            'pattern' => 'api/pages-info.json',
            'method' => 'GET',
            'action' => function () {
                return kirby()->api()->call('pages/pages-info');
            }
        ],
        [
            'pattern' => '/',
            'method'  => 'GET',
            'action'  => function () {
                return go('/panel');
            }
        ],
    ],
];

