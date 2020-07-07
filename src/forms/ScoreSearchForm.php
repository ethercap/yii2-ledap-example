<?php

namespace ethercap\ledapExample\forms;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ethercap\ledapExample\models\Score;

/**
 * ScoreSearchForm represents the model behind the search form of `ethercap\ledapExample\models\Score`.
 */
class ScoreSearchForm extends Score
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lessonId', 'studentId', 'score'], 'integer'],
            [['creationTime', 'updateTime'], 'safe'],
        ];
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
        $query = Score::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, '');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'lessonId' => $this->lessonId,
            'studentId' => $this->studentId,
            'score' => $this->score,
            'creationTime' => $this->creationTime,
            'updateTime' => $this->updateTime,
        ]);

        return $dataProvider;
    }
}
