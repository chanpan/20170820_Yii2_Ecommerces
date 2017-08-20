<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "e_information".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property string $image
 * @property string $create_at
 * @property integer $create_by
 * @property string $update_at
 * @property integer $update_by
 */
class Information extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'e_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'detail'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['create_by', 'update_by'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'ชื่อข่าวสาร'),
            'detail' => Yii::t('app', 'รายละเอียดข่าวสาร'),
            'image' => Yii::t('app', 'รูปภาพประกอบ'),
            'create_at' => Yii::t('app', 'สร้างเมื่อ'),
            'create_by' => Yii::t('app', 'สร้างโดย'),
            'update_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'update_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }
}
