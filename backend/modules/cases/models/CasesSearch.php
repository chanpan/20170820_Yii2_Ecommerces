<?php

namespace backend\modules\cases\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\cases\models\Cases;

/**
 * CasesSearch represents the model behind the search form about `backend\modules\cases\models\Cases`.
 */
class CasesSearch extends Cases
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'report_of', 'case_type_id', 'active', 'created_by', 'updated_by'], 'integer'],
            [['name', 'description', 'occurred_at', 'created_at', 'updated_at'], 'safe'],
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
        $query = Cases::find();
        $sql_col = ['cases.*'];
        
        $sql_col[] = "(SELECT count(*) FROM case_items ci INNER JOIN item ON item.id = ci.item_id WHERE ci.case_id = cases.id ) AS item_count";
        $sql_col[] = "(SELECT count(*) FROM case_items ci INNER JOIN place ON place.id = ci.place_id WHERE ci.case_id = cases.id ) AS place_count";
        $sql_col[] = "(SELECT count(*) FROM case_items ci INNER JOIN person ON person.id = ci.person_id WHERE ci.case_id = cases.id ) AS person_count";
        
        $query->select($sql_col);
        
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
            'report_of' => $this->report_of,
            'case_type_id' => $this->case_type_id,
            'occurred_at' => $this->occurred_at,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
