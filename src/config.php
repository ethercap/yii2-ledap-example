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
                'id' => 'example',
                'items' => [
                    [
                        'id' => 'dashboard',
                        'title' => 'Dashboard示例',
                        'icon' => 'fa-tachometer-alt',
                        'url' => '/ledap/default/index',
                        'items' => [],
                    ],
                    [
                        'id' => 'crudExample',
                        'title' => 'crud示例',
                        'icon' => 'fa-tachometer-alt',
                        'url' => '/ledap/student/',
                        'items' => [],
                    ],
                    [
                        'id' => 'ajaxCrudExample',
                        'title' => 'ajaxCrud示例',
                        'icon' => 'fa-tachometer-alt',
                        'url' => '/ledap/lesson/',
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
                        'id' => 'baseinput',
                        'title' => 'baseinput',
                        'url' => Url::to('/ledap/default/baseinput'),
                        'icon' => 'fa-cog',
                        'items' => [
                        ],
                    ], [
                        'id' => 'form-item',
                        'title' => 'form-item',
                        'url' => Url::to('/ledap/default/formitem'),
                        'icon' => 'fa-cog',
                        'items' => [
                        ],
                    ], [
                        'id' => 'groupinput',
                        'title' => 'groupinput',
                        'url' => Url::to('/ledap/default/groupinput'),
                        'icon' => 'fa-cog',
                        'items' => [
                        ],
                    ], [
                        'id' => 'tab',
                        'title' => 'tab',
                        'url' => Url::to('/ledap/default/tab'),
                        'icon' => 'fa-cog',
                        'items' => [
                        ],
                    ], [
                        'id' => 'checkbox',
                        'title' => 'checkbox',
                        'url' => Url::to('/ledap/default/checkbox'),
                        'icon' => 'fa-cog',
                        'items' => [
                        ],
                    ], [
                        'id' => 'radio',
                        'title' => 'radio',
                        'url' => Url::to('/ledap/default/radio'),
                        'icon' => 'fa-cog',
                        'items' => [
                        ],
                    ], [
                        'id' => 'dropdown',
                        'title' => 'dropdown',
                        'url' => Url::to('/ledap/default/dropdown'),
                        'icon' => 'fa-cog',
                        'items' => [
                        ],
                    ], [
                        'id' => 'searchinput',
                        'title' => 'searchinput',
                        'url' => Url::to('/ledap/default/searchinput'),
                        'icon' => 'fa-cog',
                        'items' => [
                        ],
                    ], [
                        'id' => 'select2',
                        'title' => 'select2',
                        'url' => Url::to('/ledap/default/select2'),
                        'icon' => 'fa-cog',
                        'items' => [
                        ],
                    ], [
                        'id' => 'grid',
                        'title' => 'grid',
                        'url' => Url::to('/ledap/default/grid'),
                        'icon' => 'fa-cog',
                        'items' => [
                        ],
                    ],
                ],
            ],
        ],
    ],
];
