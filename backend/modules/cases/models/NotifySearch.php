<?php

namespace backend\modules\cases\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\cases\models\Notify;

/**
 * NotifySearch represents the model behind the search form about `backend\modules\cases\models\Notify`.
 */
class NotifySearch extends Notify
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'notify_from_type', 'case_type_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['notify_choice', 'notify_no', 'write_at', 'notify_date', 'notify_from', 'case_type_other', 'location_text', 'sdate', 'stime', 'edate', 'etime', 'time_total', 'desc', 'emp_name', 'emp_tel', 'sufferer_name', 'sufferer_tel', 'content', 'created_at', 'updated_at','name'], 'safe'],
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
        $query = Notify::find()->joinWith(['caseType']);
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
            'notify_date' => $this->notify_date,
            'notify_from_type' => $this->notify_from_type,
            'case_type_id' => $this->case_type_id,
            'sdate' => $this->sdate,
            'stime' => $this->stime,
            'edate' => $this->edate,
            'etime' => $this->etime,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'notify_choice', $this->notify_choice])
            ->andFilterWhere(['like', 'notify_no', $this->notify_no])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'write_at', $this->write_at])
            ->andFilterWhere(['like', 'notify_from', $this->notify_from])
            ->andFilterWhere(['like', 'case_type_other', $this->case_type_other])
            ->andFilterWhere(['like', 'location_text', $this->location_text])
            ->andFilterWhere(['like', 'time_total', $this->time_total])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'emp_name', $this->emp_name])
            ->andFilterWhere(['like', 'emp_tel', $this->emp_tel])
            ->andFilterWhere(['like', 'sufferer_name', $this->sufferer_name])
            ->andFilterWhere(['like', 'sufferer_tel', $this->sufferer_tel])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
