<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Logistic;

/**
 * LogisticSearch represents the model behind the search form about `app\models\Logistic`.
 */
class LogisticSearch extends Logistic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inscription_id', 'residence', 'status'], 'integer'],
            [['leavingonorigincity', 'leavingonairline', 'leavingonflightnumber', 'leavingondate', 'leavingonhour', 'returningonairline', 'returningonflightnumber', 'returningondate', 'returningonhour', 'residenceobs', 'accommodationdatein', 'accommodationdateout', 'created_at', 'updated_at'], 'safe'],
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
        $query = Logistic::find();

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
            'leavingondate' => $this->leavingondate,
            'leavingonhour' => $this->leavingonhour,
            'returningondate' => $this->returningondate,
            'returningonhour' => $this->returningonhour,
            'residence' => $this->residence,
            'accommodationdatein' => $this->accommodationdatein,
            'accommodationdateout' => $this->accommodationdateout,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'leavingonorigincity', $this->leavingonorigincity])
            ->andFilterWhere(['like', 'leavingonairline', $this->leavingonairline])
            ->andFilterWhere(['like', 'leavingonflightnumber', $this->leavingonflightnumber])
            ->andFilterWhere(['like', 'returningonairline', $this->returningonairline])
            ->andFilterWhere(['like', 'returningonflightnumber', $this->returningonflightnumber])
            ->andFilterWhere(['like', 'residenceobs', $this->residenceobs]);

        return $dataProvider;
    }
}
