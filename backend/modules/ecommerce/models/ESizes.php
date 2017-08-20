<?php

namespace backend\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "e_sizes".
 *
 * @property integer $id
 * @property string $name
 */
class ESizes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'e_sizes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name','required'],
            ['name','unique'],
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
            'name' => Yii::t('app', 'ขนาดสินค้า'),
        ];
    }
}
