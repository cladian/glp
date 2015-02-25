<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;

/**
 * EventSearch represents the model behind the search form about `app\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'discount', 'year', 'status', 'country_id', 'eventtype_id'], 'integer'],
            [['name', 'short_description', 'general_content', 'methodology', 'addressed_to', 'included', 'requirements', 'file', 'photo', 'url', 'begin_at', 'end_at', 'city', 'discount_end_at', 'discount_description', 'created_at', 'updated_at'], 'safe'],
            [['cost'], 'number'],
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
        $query = Event::find();

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
            'cost' => $this->cost,
            'discount' => $this->discount,
            'discount_end_at' => $this->discount_end_at,
            'year' => $this->year,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'country_id' => $this->country_id,
            'eventtype_id' => $this->eventtype_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_description', $this->short_description])
            ->andFilterWhere(['like', 'general_content', $this->general_content])
            ->andFilterWhere(['like', 'methodology', $this->methodology])
            ->andFilterWhere(['like', 'addressed_to', $this->addressed_to])
            ->andFilterWhere(['like', 'included', $this->included])
            ->andFilterWhere(['like', 'requirements', $this->requirements])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'discount_description', $this->discount_description]);

        return $dataProvider;
    }
}
