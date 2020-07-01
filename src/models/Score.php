<?php

namespace ethercap\ledapExample\models;

use yii\db\ActiveRecord;
use ethercap\common\behaviors\DateTimeBehavior;

/**
 * 该model对应数据库表 "student_score".
 *
 * @property int $id
 * @property int $lessonId
 * @property int $studentId
 * @property int $score
 * @property string $creationTime
 * @property string $updateTime
 */
class Score extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_score';
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
            [['lessonId', 'studentId', 'score'], 'integer'],
            [['creationTime', 'updateTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lessonId' => 'Lesson ID',
            'studentId' => 'Student ID',
            'score' => 'Score',
            'creationTime' => 'Creation Time',
            'updateTime' => 'Update Time',
        ];
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
        ];
    }
}
