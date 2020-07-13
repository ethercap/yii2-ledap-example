<?php

namespace ethercap\ledapExample\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MarkdownAsset extends AssetBundle
{
    public $sourcePath = __DIR__.'/../static/mavon-editor';
    public $css = [
        '//cdn.jsdelivr.net/npm/mavon-editor@2.9.0/dist/css/index.css',
    ];
    public $js = [
        // 坑爹的作者，js里引的是cloudflare的静态资源，导致静态资源被墙，只好自己手动搞一份了
        'mavon-editor.js',
    ];
    public $depends = [
        '\ethercap\ledap\assets\LedapAsset',
    ];
}
