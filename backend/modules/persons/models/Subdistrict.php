<?php

namespace backend\modules\persons\models;

use Yii;

/**
 * This is the model class for table "addr_subdistrict".
 *
 * @property integer $id
 * @property string $name
 * @property integer $districtId
 *
 * @property AddrDistrict $district
 * @property Person[] $people
 * @property Place[] $places
 */
class Subdistrict extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'addr_subdistrict';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
	return [
            [['name'], 'required'],
            [['districtId'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['districtId'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['districtId' => 'id']]
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
	    'districtId' => 'District ID',
	];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
	return $this->hasOne(AddrDistrict::className(), ['id' => 'districtId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
	return $this->hasMany(Person::className(), ['subdistrictId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaces()
    {
	return $this->hasMany(Place::className(), ['subdistrict_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SubdistrictQuery the active query used by this AR class.
     */
    public static function find()
    {
	return new SubdistrictQuery(get_called_class());
    }
}
