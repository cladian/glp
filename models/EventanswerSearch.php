<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Eventanswer;

/**
 * EventanswerSearch represents the model behind the search form about `app\models\Eventanswer`.
 */
class EventanswerSearch extends Eventanswer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inscription_id', 'eventquestion_id', 'status'], 'integer'],
            [['reply', 'created_at', 'updated_at'], 'safe'],
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
        $query = Eventanswer::find();

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
            'inscription_id' => $this->inscription_id,
            'eventquestion_id' => $this->eventquestion_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'reply', $this->reply]);

        return $dataProvider;
    }
}
