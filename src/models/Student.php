<?php

namespace ethercap\ledapExample\models;

use yii\db\ActiveRecord;
use ethercap\common\behaviors\DateTimeBehavior;
use ethercap\common\behaviors\AttrBehavior;
use ethercap\common\traits\RuleTrait;
use ethercap\common\validators\DictValidator;
use ethercap\common\validators\MobileValidator;

/**
 * 该model对应数据库表 "student".
 *
 * @property int $id
 * @property string $name
 * @property string $mobile
 * @property int $status
 * @property string $attr
 * @property string $creationTime
 * @property string $updateTime
 */
class Student extends \yii\db\ActiveRecord
{
    use RuleTrait;

    /** 状态：正常*/
    const STATUS_NEW = 0;
    /** 状态：删除*/
    const STATUS_DELETED = 255;

    public static $statusArr = [
        self::STATUS_NEW => '正常',
        self::STATUS_DELETED => '已删除',
    ];

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    public static $genderArr = [
        self::GENDER_MALE => '男',
        self::GENDER_FEMALE => '女',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
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
            [['name', 'mobile'], 'required'],
            //我们给电话加一个正则表达式，这个正则表达式也会传给前端，前端会用这个正则来校验
            ['mobile', MobileValidator::class],
            [['status'], 'integer'],
            [['attr'], 'string'],
            [['creationTime', 'updateTime'], 'safe'],
            [['name', 'mobile'], 'string', 'max' => 16],
            [['mobile'], 'unique'],
            // dictValidator是很重要的一个rule, 代表gender只能为后面arr的key的取值。同时，前端也会用后面的arr来校验，以及生成dropdownlist等。
            ['gender', DictValidator::class, 'list' => self::$genderArr],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'mobile' => '电话',
            'gender' => '性别',
            'status' => '状态',
            'attr' => 'Attr',
            'creationTime' => '创建时间',
            'updateTime' => '编辑时间',
        ];
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
            //一些不需要搜索的字段，可以以json形式放置于attr中
            [
                'class' => AttrBehavior::class,
                'attrKey' => 'attr',
                'properties' => [
                    'gender' => self::GENDER_MALE,
                ],
            ],
        ];
    }
}
