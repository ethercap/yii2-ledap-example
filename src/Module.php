<?php

namespace ethercap\ledapExample;

use Yii;
use yii\di\Instance;
use yii\db\Connection;

/**
 * passwd module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    // 数据库
    public $db;
    public $controllerNamespace = 'ethercap\ledapExample\controllers';
    public $layout = '@vendor/ethercap/yii2-ledap-example/src/views/layouts/main';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (empty($this->db)) {
            $file = Yii::getAlias('@app/runtime/example.db');
            if (!file_exists($file)) {
                $sourceFile = __DIR__.'/sql/example.db';
                copy($sourceFile, $file);
            }
            $this->db = [
                'class' => 'yii\db\Connection',
                'dsn' => 'sqlite:'.$file,
            ];
        }
        if (!isset(Yii::$app->request->parsers['application/json'])) {
            Yii::$app->request->parsers['application/json'] = 'yii\web\JsonParser';
        }
        $this->db = Instance::ensure($this->db, Connection::class);
        \Yii::configure($this, require(__DIR__ . '/config.php'));
        parent::init();
    }
}
