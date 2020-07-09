<?php

namespace ethercap\ledapExample\assets;

use yii\web\AssetBundle;

/**
 * Main widget application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        '/js/ledap/common.js?v=4',
    ];
    public $depends = [
        '\ethercap\ledap\assets\SBadminAsset',
        '\ethercap\ledap\assets\AppAsset',
    ];
}
