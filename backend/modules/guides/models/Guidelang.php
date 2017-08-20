<?php

namespace backend\modules\guides\models;

use Yii;

/**
 * This is the model class for table "guidelang".
 *
 * @property integer $id
 * @property string $name
 */
class Guidelang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guidelang';
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
            'id' => 'ID',
            'name' => 'ภาษาโปรแกรมมิ่ง',
        ];
    }
}
