<?php

namespace backend\modules\addr\models;

use Yii;

/**
 * This is the model class for table "addr_country".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 */
class AddrCountry extends \yii\db\ActiveRecord
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
	    'id' => Yii::t('app', 'ID'),
	    'code' => Yii::t('app', 'รหัส'),
	    'name' => Yii::t('app', 'ชื่อ'),
	];
    }
}
