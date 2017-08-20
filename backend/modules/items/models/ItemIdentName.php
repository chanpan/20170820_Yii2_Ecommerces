<?php

namespace backend\modules\items\models;

use Yii;

/**
 * This is the model class for table "item_ident_name".
 *
 * @property integer $id
 * @property integer $term_taxonomy_id
 * @property string $identification1_name
 * @property string $identification2_name
 * @property string $identification3_name
 * @property string $identification4_name
 * @property string $identification5_name
 */
class ItemIdentName extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'item_ident_name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
	return [
            [['id', 'term_taxonomy_id'], 'required'],
            [['id', 'term_taxonomy_id'], 'integer'],
            [['identification1_name', 'identification2_name', 'identification3_name', 'identification4_name', 'identification5_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'term_taxonomy_id' => Yii::t('app', 'กลุ่ม'),
	    'identification1_name' => Yii::t('app', 'ชื่อของข้อมูลยืนยันสิ่งของ 1'),
	    'identification2_name' => Yii::t('app', 'ชื่อของข้อมูลยืนยันสิ่งของ 2'),
	    'identification3_name' => Yii::t('app', 'ชื่อของข้อมูลยืนยันสิ่งของ 3'),
	    'identification4_name' => Yii::t('app', 'ชื่อของข้อมูลยืนยันสิ่งของ 4'),
	    'identification5_name' => Yii::t('app', 'ชื่อของข้อมูลยืนยันสิ่งของ 5'),
	];
    }
}
