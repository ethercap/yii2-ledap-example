<?php

namespace ethercap\ledapExample\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MarkdownAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//cdn.jsdelivr.net/npm/mavon-editor@2.9.0/dist/css/index.css',
    ];
    public $js = [
        '//cdn.jsdelivr.net/npm/mavon-editor@2.9.0/dist/mavon-editor.js',
    ];
    public $depends = [
        '\ethercap\ledap\assets\LedapAsset',
    ];
}
