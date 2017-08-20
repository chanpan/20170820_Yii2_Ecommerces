<?php

namespace backend\modules\addr\models;

use Yii;
use backend\modules\places\models\Place;
use backend\modules\addr\models\AddrSubdistrict;
use backend\modules\addr\models\AddrProvince;

/**
 * This is the model class for table "addr_district".
 *
 * @property integer $id
 * @property string $name
 * @property integer $provinceId
 *
 * @property AddrProvince $province
 * @property AddrSubdistrict[] $addrSubdistricts
 * @property Place[] $places
 */
class AddrDistrict extends \yii\db\ActiveRecord
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
            [['name', 'provinceId'], 'required'],
            [['provinceId'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['provinceId'], 'exist', 'skipOnError' => true, 'targetClass' => AddrProvince::className(), 'targetAttribute' => ['provinceId' => 'id']]
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
	    'provinceId' => Yii::t('app', 'จังหวัด'),
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
    public function getPlaces()
    {
	return $this->hasMany(Place::className(), ['district_id' => 'id']);
    }
}
