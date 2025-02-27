<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen.
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => true,
    'hooks' => [
        'page.render:before' => function ($event) {
            header("Access-Control-Allow-Origin: *");
        }
    ],
    'routes' => [
        [
            'pattern' => '/declic-mobilite',
            'action'  => function() {
                return go('https://modus-ge.ch/forms/declic-mobilite');
            }
        ],
        [
            'pattern' => '/',
            'action'  => function() {
                return go('/panel');
            }
        ],
        [
            'pattern' => '/links-tree/formulaire_inscription_202502',
            'action'  => function() {
                return go('https://modus-ge.ch/forms/declic-mobilite');
            }
        ],
        [
            'pattern' => '/contact',
            'method' => 'GET|POST',
            'action' => function () {
                header("Access-Control-Allow-Origin: *");
                return Page::factory([
                    'template'  => 'contact',
                    'slug'      => 'contact',
                ]);
            }
        ],
        [
            'pattern' => '/pages-info.json',
            'method' => 'GET',
            'action' => function () {
                header("Access-Control-Allow-Origin: *");
                return Page::factory([
                    'template'  => 'pages-info',
                    'slug'      => 'pages-info',
                ]);
            }
        ],
    ]
];
