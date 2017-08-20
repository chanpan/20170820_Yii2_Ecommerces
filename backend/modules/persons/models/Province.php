<?php

namespace backend\modules\persons\models;

use Yii;

/**
 * This is the model class for table "addr_province".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 *
 * @property AddrDistrict[] $addrDistricts
 * @property Person[] $people
 * @property Place[] $places
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'addr_province';
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
    public function getAddrDistricts()
    {
	return $this->hasMany(AddrDistrict::className(), ['provinceId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
	return $this->hasMany(Person::className(), ['province_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaces()
    {
	return $this->hasMany(Place::className(), ['province_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ProvinceQuery the active query used by this AR class.
     */
    public static function find()
    {
	return new ProvinceQuery(get_called_class());
    }
}
