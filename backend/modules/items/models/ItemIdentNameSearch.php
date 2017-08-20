<?php

namespace backend\modules\items\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\items\models\ItemIdentName;

/**
 * ItemIdentNameSearch represents the model behind the search form about `backend\modules\items\models\ItemIdentName`.
 */
class ItemIdentNameSearch extends ItemIdentName
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'term_taxonomy_id'], 'integer'],
            [['identification1_name', 'identification2_name', 'identification3_name', 'identification4_name', 'identification5_name'], 'safe'],
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
        $query = ItemIdentName::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'term_taxonomy_id' => $this->term_taxonomy_id,
        ]);

        $query->andFilterWhere(['like', 'identification1_name', $this->identification1_name])
            ->andFilterWhere(['like', 'identification2_name', $this->identification2_name])
            ->andFilterWhere(['like', 'identification3_name', $this->identification3_name])
            ->andFilterWhere(['like', 'identification4_name', $this->identification4_name])
            ->andFilterWhere(['like', 'identification5_name', $this->identification5_name]);

        return $dataProvider;
    }
}
