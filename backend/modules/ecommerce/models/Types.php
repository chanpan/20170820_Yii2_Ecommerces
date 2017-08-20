<?php

namespace backend\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "e_types".
 *
 * @property integer $id
 * @property string $name
 * @property integer $group_id
 */
class Types extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'e_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'ประเภทสินค้า'),
            'group_id' => Yii::t('app', 'หมวดหมู่'),
        ];
    }
    public function getGroups(){
        return $this->hasOne(EGroup::className(),['id'=>'group_id']);
    }
}
