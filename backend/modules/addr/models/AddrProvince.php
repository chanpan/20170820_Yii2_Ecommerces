<?php

namespace backend\modules\addr\models;

use Yii;
use backend\modules\places\models\Place;
use backend\modules\addr\models\AddrDistrict;

/**
 * This is the model class for table "addr_province".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 *
 * @property AddrDistrict[] $addrDistricts
 * @property Place[] $places
 */
class AddrProvince extends \yii\db\ActiveRecord
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
	    'id' => Yii::t('app', 'ID'),
	    'code' => Yii::t('app', 'รหัส'),
	    'name' => Yii::t('app', 'ชื่อ'),
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
    public function getPlaces()
    {
	return $this->hasMany(Place::className(), ['province_id' => 'id']);
    }
}
