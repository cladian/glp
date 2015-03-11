<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Phforum;

/**
 * PhforumSearch represents the model behind the search form about `app\models\Phforum`.
 */
class PhforumSearch extends Phforum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'topic_number', 'event_id', 'status', 'is_private'], 'integer'],
            [['name', 'begin_at', 'end_at', 'meeting_at', 'memory_at', 'content', 'created_at', 'updated_at'], 'safe'],
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
        $query = Phforum::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'begin_at' => $this->begin_at,
            'end_at' => $this->end_at,
            'meeting_at' => $this->meeting_at,
            'memory_at' => $this->memory_at,
            'topic_number' => $this->topic_number,
            'event_id' => $this->event_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_private' => $this->is_private,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
