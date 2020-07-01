<?php

namespace ethercap\ledapExample\forms;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ethercap\ledapExample\models\Lesson;
use yii\helpers\ArrayHelper;

/**
 * LessonSearchForm represents the model behind the search form of `ethercap\ledapExample\models\Lesson`.
 */
class LessonSearchForm extends Lesson
{
    public $from;
    public $to;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name', 'from', 'to'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'from' => '时间',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Lesson::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params, '');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if ($this->from) {
            $query->andWhere(['>=', 'creationTime', $this->from]);
        }

        if ($this->to) {
            $query->andWhere(['<', 'creationTime', $this->to]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'attr', $this->attr]);

        return $dataProvider;
    }
}
