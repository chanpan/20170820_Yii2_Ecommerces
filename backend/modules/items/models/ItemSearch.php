<?php

namespace backend\modules\items\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\items\models\Item;

/**
 * ItemSearch represents the model behind the search form about `backend\modules\items\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_group_id', 'active', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description', 'identification1', 'identification2', 'identification3', 'identification4', 'identification5', 'created_at', 'updated_at'], 'safe'],
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
        $query = Item::find();

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
            'item_group_id' => $this->item_group_id,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'identification1', $this->identification1])
            ->andFilterWhere(['like', 'identification2', $this->identification2])
            ->andFilterWhere(['like', 'identification3', $this->identification3])
            ->andFilterWhere(['like', 'identification4', $this->identification4])
            ->andFilterWhere(['like', 'identification5', $this->identification5]);

        return $dataProvider;
    }
    
    public function search2($params)
    {
        $query = Item::find();
        $query->innerJoin('case_items', 'case_items.item_id = item.id');
        $query->innerJoin('case_items_type', 'case_items_type.id = case_items.case_items_type_id');
        $query->where('case_items.case_id = :case', [':case'=>$this->case_id]);
        $query->select('item.*, case_items_type.name as case_items_type_id');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>false,
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'item_group_id' => $this->item_group_id,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'identification1', $this->identification1])
            ->andFilterWhere(['like', 'identification2', $this->identification2])
            ->andFilterWhere(['like', 'identification3', $this->identification3])
            ->andFilterWhere(['like', 'identification4', $this->identification4])
            ->andFilterWhere(['like', 'identification5', $this->identification5]);

        return $dataProvider;
    }
    
}
