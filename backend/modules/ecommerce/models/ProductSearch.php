<?php

namespace backend\modules\ecommerce\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\ecommerce\models\Product;

/**
 * ProductSearch represents the model behind the search form about `backend\modules\ecommerce\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'bid', 'name', 'detail', 'image', 'create_at', 'update_at'], 'safe'],
            [['price'], 'number'],
            [['price2', 'qty', 'type_id', 'pro_id', 'color_id', 'size_id', 'brand_id', 'create_by', 'update_by'], 'integer'],
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
        $query = Product::find();

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
            'price' => $this->price,
            'price2' => $this->price2,
            'qty' => $this->qty,
            'type_id' => $this->type_id,
            'pro_id' => $this->pro_id,
            'color_id' => $this->color_id,
            'size_id' => $this->size_id,
            'brand_id' => $this->brand_id,
            'create_at' => $this->create_at,
            'create_by' => $this->create_by,
            'update_at' => $this->update_at,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'pid', $this->pid])
            ->andFilterWhere(['like', 'bid', $this->bid])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
