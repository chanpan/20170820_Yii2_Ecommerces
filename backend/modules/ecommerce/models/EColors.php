<?php

namespace backend\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "e_colors".
 *
 * @property integer $id
 * @property string $name
 */
class EColors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'e_colors';
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
            'name' => Yii::t('app', 'สี'),
        ];
    }
}
