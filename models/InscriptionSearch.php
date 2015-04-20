<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inscription;

/**
 * InscriptionSearch represents the model behind the search form about `app\models\Inscription`.
 */
class InscriptionSearch extends Inscription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'exposition', 'service_terms', 'complete', 'status', 'complete_logistic', 'complete_eventquiz', 'complete_quiz', 'event_id', 'user_id', 'registertype_type', 'registertype_assigment'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = Inscription::find();
        /*$query->joinWith(['event']);*/

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
            'exposition' => $this->exposition,
            'service_terms' => $this->service_terms,
            'complete' => $this->complete,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'complete_logistic' => $this->complete_logistic,
            'complete_eventquiz' => $this->complete_eventquiz,
            'complete_quiz' => $this->complete_quiz,
            'event_id' => $this->event_id,
            'user_id' => $this->user_id,
            'registertype_type' => $this->registertype_type,
            'registertype_assigment' => $this->registertype_assigment,
        ]);
        /*->andFilterWhere(['like', 'event.id', $this->event_id]);*/

        return $dataProvider;
    }

    public function searchByuser($params,$id)
    {
        $query = Inscription::find();
        /*$query->joinWith(['event']);*/

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
            'exposition' => $this->exposition,
            'service_terms' => $this->service_terms,
            'complete' => $this->complete,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'complete_logistic' => $this->complete_logistic,
            'complete_eventquiz' => $this->complete_eventquiz,
            'complete_quiz' => $this->complete_quiz,
            'event_id' => $this->event_id,
            'user_id' => $id,
            'registertype_type' => $this->registertype_type,
            'registertype_assigment' => $this->registertype_assigment,
        ]);
        /*->andFilterWhere(['like', 'event.id', $this->event_id]);*/

        return $dataProvider;
    }


    public function searchown($params)
    {
        $query = Inscription::find();
        /*$query->joinWith(['event']);*/

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
            'exposition' => $this->exposition,
            'service_terms' => $this->service_terms,
            'complete' => $this->complete,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'complete_logistic' => $this->complete_logistic,
            'complete_eventquiz' => $this->complete_eventquiz,
            'complete_quiz' => $this->complete_quiz,
            'event_id' => $this->event_id,
            'user_id' => yii::$app->user->identity->id,
            'registertype_type' => $this->registertype_type,
            'registertype_assigment' => $this->registertype_assigment,
        ]);
        /*->andFilterWhere(['like', 'event.id', $this->event_id]);*/

        return $dataProvider;
    }
    public function searchByEvent($params, $id)
    {
        $query = Inscription::find();
        /*$query->joinWith(['event']);*/

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
            'exposition' => $this->exposition,
            'service_terms' => $this->service_terms,
            'complete' => $this->complete,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'complete_logistic' => $this->complete_logistic,
            'complete_eventquiz' => $this->complete_eventquiz,
            'complete_quiz' => $this->complete_quiz,
            'event_id' => $id,
            'user_id' => $this->user_id,
            'registertype_type' => $this->registertype_type,
            'registertype_assigment' => $this->registertype_assigment,
        ]);
        /*->andFilterWhere(['like', 'event.id', $this->event_id]);*/

        return $dataProvider;
    }
}
