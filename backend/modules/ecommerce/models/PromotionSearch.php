<?php

namespace backend\modules\ecommerce\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\ecommerce\models\Promotion;

/**
 * PromotionSearch represents the model behind the search form about `backend\modules\ecommerce\models\Promotion`.
 */
class PromotionSearch extends Promotion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'discount'], 'integer'],
            [['name', 'detail', 'date_start', 'date_end'], 'safe'],
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
        $query = Promotion::find();

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
            'discount' => $this->discount,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
