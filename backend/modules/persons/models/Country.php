<?php

namespace backend\modules\persons\models;

use Yii;

/**
 * This is the model class for table "addr_country".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 *
 * @property Person[] $people
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'addr_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
	return [
            [['name'], 'required'],
            [['code', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => 'ID',
	    'code' => 'Code',
	    'name' => 'Name',
	];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
	return $this->hasMany(Person::className(), ['country_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
	return new CountryQuery(get_called_class());
    }
}
