<?php

namespace backend\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "e_promotion".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property integer $discount
 * @property string $date_start
 * @property string $date_end
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'e_promotion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detail'], 'string'],
            [['discount'], 'integer'],
            [['date_start', 'date_end'], 'safe'],
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
            'name' => Yii::t('app', 'ชื่อโปรโมชั่น'),
            'detail' => Yii::t('app', 'รายละเอียดโปรโมชั่น'),
            'discount' => Yii::t('app', 'ราคาส่วนลด (%)'),
            'date_start' => Yii::t('app', 'วันที่เริ่มจัดโปร'),
            'date_end' => Yii::t('app', 'วันที่สิ้นสุดโปร'),
        ];
    }
}
