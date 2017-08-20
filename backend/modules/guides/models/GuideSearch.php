<?php

namespace backend\modules\guides\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\guides\models\Guides;

/**
 * GuideSearch represents the model behind the search form about `backend\modules\guides\models\Guides`.
 */
class GuideSearch extends Guides
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lang', 'types'], 'integer'],
            [['install', 'codes','name'], 'safe'],
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
        $query = Guides::find();

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
            'lang' => $this->lang,
            'types' => $this->types,
            'name' => $this->name,
        ]);

        $query->andFilterWhere(['like', 'install', $this->install])
            ->andFilterWhere(['like', 'codes', $this->codes]);

        return $dataProvider;
    }
}
