<?php

namespace backend\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "e_group".
 *
 * @property integer $id
 * @property string $name
 */
class EGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'e_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'name' => Yii::t('app', 'หมวดหมู่สินค้า'),
        ];
    }
}
