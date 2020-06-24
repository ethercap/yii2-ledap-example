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
                'title' => '示例',
                'id' => 'basic',
                'items' => [
                    [
                        'id' => 'dashboard',
                        'title' => 'Dashboard示例',
                        'icon' => 'fa-tachometer-alt',
                        'url' => Url::to('default/index'),
                        'items' => [],
                    ],
                    [
                        'id' => 'crudExample',
                        'title' => 'crud示例',
                        'icon' => 'fa-tachometer-alt',
                        'url' => Url::to('default/index'),
                        'items' => [],
                    ],
                    [
                        'id' => 'ajaxCrudExample',
                        'title' => 'ajaxCrud示例',
                        'icon' => 'fa-tachometer-alt',
                        'url' => Url::to('default/index'),
                        'items' => [],
                    ],
                ],
            ],
            [
                'title' => '基础',
                'id' => 'basic',
                'items' => [
                    [
                        'id' => 'default-install',
                        'title' => '安装',
                        'icon' => 'fa-tachometer-alt',
                        'url' => Url::to('default/index'),
                        'items' => [],
                    ],
                    [
                        'id' => 'default-guide',
                        'title' => '入门',
                        'icon' => 'fa-tachometer-alt',
                        'url' => Url::to('default/index'),
                        'items' => [],
                    ],
                ],
            ],
            [
                'title' => '组件',
                'id' => 'CrudGroup',
                'items' => [
                    [
                        'id' => 'select2',
                        'title' => '搜索框',
                        'icon' => '',
                        'items' => [
                        ],
                    ],
                    [
                        'id' => 'grid',
                        'title' => 'grid',
                        'icon' => '',
                        'items' => [
                        ],
                    ],
                ],
            ],
        ],
    ],
];
