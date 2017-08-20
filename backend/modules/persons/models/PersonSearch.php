<?php

namespace backend\modules\persons\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\persons\models\Person;

/**
 * PersonSearch represents the model behind the search form about `backend\modules\persons\models\Person`.
 */
class PersonSearch extends Person
{
    public $fullNameTH;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'person_group_id', 'image_id', 'raceId', 'nationality_id', 'blood_type_id', 'religion_id', 'gender_id', 'military_status_id', 'marriage_status_id', 'subdistrictId', 'districtId', 'province_id', 'country_id', 'active', 'created_by', 'updated_by'], 'integer'],
            [['fullNameTH','id_number', 'id_card_issue_date', 'id_card_issue_at', 'id_card_expiry_date', 'passport_number', 'th_title_name', 'th_first_name', 'th_middle_name', 'th_last_name', 'th_nickname', 'en_title_name', 'en_first_name', 'en_middle_name', 'en_last_name', 'en_nickname', 'birthdate', 'occupation', 'address', 'postal_code', 'phone_number', 'mobile_number', 'work_number', 'fax_number', 'other_number', 'email', 'facebook', 'twitter', 'line', 'note', 'created_at', 'updated_at'], 'safe'],
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
        $query = Person::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['fullNameTH'] = [
                'asc' => ['th_first_name' => SORT_ASC, 'th_last_name' => SORT_ASC],
                'desc' => ['th_first_name' => SORT_DESC, 'th_last_name' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'person_group_id' => $this->person_group_id,
            'image_id' => $this->image_id,
            'id_card_issue_date' => $this->id_card_issue_date,
            'id_card_expiry_date' => $this->id_card_expiry_date,
            'raceId' => $this->raceId,
            'nationality_id' => $this->nationality_id,
            'blood_type_id' => $this->blood_type_id,
            'religion_id' => $this->religion_id,
            'gender_id' => $this->gender_id,
            'military_status_id' => $this->military_status_id,
            'marriage_status_id' => $this->marriage_status_id,
            'birthdate' => $this->birthdate,
            'subdistrictId' => $this->subdistrictId,
            'districtId' => $this->districtId,
            'province_id' => $this->province_id,
            'country_id' => $this->country_id,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andWhere('th_first_name like "%'.$this->fullNameTH.'%" OR  th_last_name like "%'.$this->fullNameTH.'%" ');

        $query->andFilterWhere(['like', 'id_number', $this->id_number])
            ->andFilterWhere(['like', 'id_card_issue_at', $this->id_card_issue_at])
            ->andFilterWhere(['like', 'passport_number', $this->passport_number])
            ->andFilterWhere(['like', 'th_title_name', $this->th_title_name])
            ->andFilterWhere(['like', 'th_first_name', $this->th_first_name])
            ->andFilterWhere(['like', 'th_middle_name', $this->th_middle_name])
            ->andFilterWhere(['like', 'th_last_name', $this->th_last_name])
            ->andFilterWhere(['like', 'th_nickname', $this->th_nickname])
            ->andFilterWhere(['like', 'en_title_name', $this->en_title_name])
            ->andFilterWhere(['like', 'en_first_name', $this->en_first_name])
            ->andFilterWhere(['like', 'en_middle_name', $this->en_middle_name])
            ->andFilterWhere(['like', 'en_last_name', $this->en_last_name])
            ->andFilterWhere(['like', 'en_nickname', $this->en_nickname])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'mobile_number', $this->mobile_number])
            ->andFilterWhere(['like', 'work_number', $this->work_number])
            ->andFilterWhere(['like', 'fax_number', $this->fax_number])
            ->andFilterWhere(['like', 'other_number', $this->other_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'twitter', $this->twitter])
            ->andFilterWhere(['like', 'line', $this->line])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }

    public function search2($params)
    {
        $query = Person::find();
        $query->innerJoin('case_items', 'case_items.person_id = person.id');
        $query->innerJoin('case_items_type', 'case_items_type.id = case_items.case_items_type_id');
        $query->where('case_items.case_id = :case', [':case'=>$this->case_id]);
        $query->select('person.*, case_items_type.name as case_items_type_id');
        
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
            'person_group_id' => $this->person_group_id,
            'image_id' => $this->image_id,
            'id_card_issue_date' => $this->id_card_issue_date,
            'id_card_expiry_date' => $this->id_card_expiry_date,
            'raceId' => $this->raceId,
            'nationality_id' => $this->nationality_id,
            'blood_type_id' => $this->blood_type_id,
            'religion_id' => $this->religion_id,
            'gender_id' => $this->gender_id,
            'military_status_id' => $this->military_status_id,
            'marriage_status_id' => $this->marriage_status_id,
            'birthdate' => $this->birthdate,
            'subdistrictId' => $this->subdistrictId,
            'districtId' => $this->districtId,
            'province_id' => $this->province_id,
            'country_id' => $this->country_id,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'id_number', $this->id_number])
            ->andFilterWhere(['like', 'id_card_issue_at', $this->id_card_issue_at])
            ->andFilterWhere(['like', 'passport_number', $this->passport_number])
            ->andFilterWhere(['like', 'th_title_name', $this->th_title_name])
            ->andFilterWhere(['like', 'th_first_name', $this->th_first_name])
            ->andFilterWhere(['like', 'th_middle_name', $this->th_middle_name])
            ->andFilterWhere(['like', 'th_last_name', $this->th_last_name])
            ->andFilterWhere(['like', 'th_nickname', $this->th_nickname])
            ->andFilterWhere(['like', 'en_title_name', $this->en_title_name])
            ->andFilterWhere(['like', 'en_first_name', $this->en_first_name])
            ->andFilterWhere(['like', 'en_middle_name', $this->en_middle_name])
            ->andFilterWhere(['like', 'en_last_name', $this->en_last_name])
            ->andFilterWhere(['like', 'en_nickname', $this->en_nickname])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'mobile_number', $this->mobile_number])
            ->andFilterWhere(['like', 'work_number', $this->work_number])
            ->andFilterWhere(['like', 'fax_number', $this->fax_number])
            ->andFilterWhere(['like', 'other_number', $this->other_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'twitter', $this->twitter])
            ->andFilterWhere(['like', 'line', $this->line])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
