<?php

namespace ethercap\ledapExample\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class VchartAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//cdn.jsdelivr.net/npm/v-charts/lib/style.min.css',
    ];
    public $js = [
        '//cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js',
        '//cdn.jsdelivr.net/npm/v-charts/lib/index.min.js',
    ];
    public $depends = [
        '\ethercap\ledap\assets\LedapAsset',
    ];
}
