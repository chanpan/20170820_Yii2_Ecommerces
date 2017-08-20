<?php

namespace backend\modules\addr\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\addr\models\AddrSubdistrict;

/**
 * AddrSubdistrictSearch represents the model behind the search form about `backend\modules\addr\models\AddrSubdistrict`.
 */
class AddrSubdistrictSearch extends AddrSubdistrict
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'districtId'], 'integer'],
            [['name'], 'safe'],
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
        $query = AddrSubdistrict::find();

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
            'districtId' => $this->districtId,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
