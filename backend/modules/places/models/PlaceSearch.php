<?php

namespace backend\modules\places\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\places\models\Place;

/**
 * PlaceSearch represents the model behind the search form about `backend\modules\places\models\Place`.
 */
class PlaceSearch extends Place
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'place_group_id', 'subdistrict_id', 'district_id', 'province_id', 'active', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description', 'facility', 'postal_code', 'created_at', 'updated_at'], 'safe'],
            [['case_items_type_id', 'case_id'], 'safe'],
            [['latitude', 'longitude'], 'number'],
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
        $query = Place::find();

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
            'place_group_id' => $this->place_group_id,
            'subdistrict_id' => $this->subdistrict_id,
            'district_id' => $this->district_id,
            'province_id' => $this->province_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'facility', $this->facility])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code]);

        return $dataProvider;
    }
    
    public function search2($params)
    {
        $query = Place::find();
        $query->innerJoin('case_items', 'case_items.place_id = place.id');
        $query->innerJoin('case_items_type', 'case_items_type.id = case_items.case_items_type_id');
        $query->where('case_items.case_id = :case', [':case'=>$this->case_id]);
        $query->select('place.*, case_items_type.name as case_items_type_id');
        
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
            'place_group_id' => $this->place_group_id,
            'subdistrict_id' => $this->subdistrict_id,
            'district_id' => $this->district_id,
            'province_id' => $this->province_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'facility', $this->facility])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code]);

        return $dataProvider;
    }
    
}
