<?php

namespace ethercap\ledapExample\models;

use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use ethercap\common\behaviors\DateTimeBehavior;
use ethercap\common\behaviors\AttrBehavior;
use ethercap\common\traits\RuleTrait;
use ethercap\common\validators\DictValidator;

/**
 * 该model对应数据库表 "lesson".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $attr
 * @property string $creationTime
 * @property string $updateTime
 */
class Lesson extends \yii\db\ActiveRecord
{
    use RuleTrait;

    /** 状态：正常*/
    const STATUS_NEW = 0;
    const STATUS_DISABLED = 1;
    /** 状态：删除*/
    const STATUS_DELETED = 255;

    public static $statusArr = [
        self::STATUS_NEW => '正常',
        self::STATUS_DISABLED => '暂停',
        self::STATUS_DELETED => '已删除',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return \ethercap\ledapExample\Module::getInstance()->db;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status'], 'integer'],
            [['attr'], 'string'],
            [['creationTime', 'updateTime'], 'safe'],
            [['name'], 'string', 'max' => 16],
            ['comment', 'string'],
            [['name'], 'unique'],
            ['status', DictValidator::class, 'list' => self::$statusArr, 'excludes' => [''.self::STATUS_DELETED], ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'status' => '状态',
            'attr' => 'attr',
            'comment' => '备注',
            'creationTime' => '创建时间',
            'updateTime' => '更新时间',
        ];
    }

    //获取status的描述
    public function getStatusDesc($default = '未知')
    {
        return ArrayHelper::getValue(self::$statusArr, $this->status, $default);
    }

    //软删除
    public function setDelete($autoSave = true)
    {
        $this->status = self::STATUS_DELETED;
        $autoSave && $this->save(false);
    }

    public function behaviors()
    {
        return [
            [
                'class' => DateTimeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['creationTime', 'updateTime'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updateTime'],
                ],
            ],
            [
                'class' => AttrBehavior::class,
                'attrKey' => 'attr',
                'properties' => [
                    'comment' => '',
                ],
            ],
        ];
    }
}
