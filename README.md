# yii2-ledap-example
========================


安装
------------

推荐的方式是通过composer 进行下载安装[composer](http://getcomposer.org/download/)。

在命令行执行
```
php composer.phar require "ethercap/yii2-ledap-example" "dev-master"
```

或加入

```
"ethercap/yii2-ledap-example": "dev-master"
```

到你的`composer.json`文件中的require段。

使用
-----

**module配置**

一旦你安装了这个插件，你就可以直接在yii2的配置文件中加入如下的代码：


```php
return [
    'modules' => [
        'ledap' => [
            'class' => '\ethercap\ledapExample\Module',
        ],
    ],
];
```
然后需要把静态资源放置到web目录下：

```bash
cd your_project
#注意需要保证web用户有权限访问这个目录，否则页面会无法加载
ln -s `pwd`/vendor/ethercap/yii2-ledap-example/src/webroot frontend/web/js/ledap
```
