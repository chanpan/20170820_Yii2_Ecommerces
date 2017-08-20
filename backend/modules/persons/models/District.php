<?php

namespace backend\modules\persons\models;

use Yii;

/**
 * This is the model class for table "addr_district".
 *
 * @property integer $id
 * @property string $name
 * @property integer $provinceId
 *
 * @property AddrProvince $province
 * @property AddrSubdistrict[] $addrSubdistricts
 * @property Person[] $people
 * @property Place[] $places
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'addr_district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
	return [
            [['name'], 'required'],
            [['provinceId'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['provinceId'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['provinceId' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => 'ID',
	    'name' => 'Name',
	    'provinceId' => 'Province ID',
	];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
	return $this->hasOne(AddrProvince::className(), ['id' => 'provinceId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddrSubdistricts()
    {
	return $this->hasMany(AddrSubdistrict::className(), ['districtId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
	return $this->hasMany(Person::className(), ['districtId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaces()
    {
	return $this->hasMany(Place::className(), ['district_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return DistrictQuery the active query used by this AR class.
     */
    public static function find()
    {
	return new DistrictQuery(get_called_class());
    }
}
