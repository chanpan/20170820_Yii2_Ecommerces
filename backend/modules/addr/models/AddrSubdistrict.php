<?php

namespace backend\modules\addr\models;

use Yii;
use backend\modules\addr\models\AddrDistrict;
use backend\modules\places\models\Place;

/**
 * This is the model class for table "addr_subdistrict".
 *
 * @property integer $id
 * @property string $name
 * @property integer $districtId
 *
 * @property AddrDistrict $district
 * @property Place[] $places
 */
class AddrSubdistrict extends \yii\db\ActiveRecord
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
            [['name', 'districtId'], 'required'],
            [['districtId'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['districtId'], 'exist', 'skipOnError' => true, 'targetClass' => AddrDistrict::className(), 'targetAttribute' => ['districtId' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'name' => Yii::t('app', 'ชื่อ'),
	    'districtId' => Yii::t('app', 'อำเภอ'),
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
    public function getPlaces()
    {
	return $this->hasMany(Place::className(), ['subdistrict_id' => 'id']);
    }
}
