<?php

use yii\helpers\Url;

return [
    'controllerNamespace' => 'ethercap\ledapExample\controllers',
    'layout' => '@vendor/ethercap/yii2-ledap-example/src/views/layouts/main',
    'components' => [
    ],
    'defaultRoute' => 'default/index',
    'params' => [
        'menu' => [
            [
                'id' => 'dashboard',
                'title' => 'Dashboard',
                'icon' => 'dashboard',
                'url' => Url::to('default/index'),
                'items' => [],
            ],
            [
                'id' => 'crud',
                'title' => 'Crud',
                'icon' => '',
                'items' => [
                ],
            ],
        ],
    ],
];
