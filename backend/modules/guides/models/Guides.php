<?php

namespace backend\modules\guides\models;

use Yii;

/**
 * This is the model class for table "guides".
 *
 * @property integer $id
 * @property string $install
 * @property string $codes
 * @property integer $lang
 * @property integer $types
 */
class Guides extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guides';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['install', 'codes','name'], 'string'],
            [['lang', 'types'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'install' => 'โค้ดติดตั้ง',
            'codes' => 'ตัวอย่างโค้ด',
            'lang' => 'ภาษา',
            'types' => 'ประเภท',
            'name'=>'ชื่อเรียก'
        ];
    }
    public function getLangs(){
        return $this->hasOne(Guidelang::className(), ["id"=>"lang"]);
    }
    public function getType(){
        return $this->hasOne(Guidetype::className(), ["id"=>"types"]);
    }
}
