<?php

namespace backend\modules\ecommerce\models;

use Yii;

/**
 * This is the model class for table "e_product".
 *
 * @property string $id
 * @property string $name
 * @property string $detail
 * @property string $price
 * @property integer $qty
 * @property integer $group_id
 * @property integer $color_id
 * @property string $image
 * @property integer $size_id
 * @property string $create_at
 * @property integer $create_by
 * @property string $update_at
 * @property integer $update_by
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'e_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        
        return [
            [['id', 'pid', 'name', 'price', 'type_id','size_id','color_id'], 'required'],
            [['detail', 'image'], 'string'],
            [['price'], 'number'],
            [['pid'],'unique','message'=>'รหัสสินค้านี้มีการใช้งานแล้ว'],
            [['price2', 'qty', 'pro_id', 'size_id', 'brand_id', 'create_by', 'update_by'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['id'], 'string', 'max' => 10],
            [['pid', 'bid', 'name'], 'string', 'max' => 255],
        ]; 
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [ 
            'id' => Yii::t('app', 'รหัสสินค้า'),
            'pid' => Yii::t('app', 'รหัสสินค้า'),
            'bid' => Yii::t('app', 'รหัสบาร์โค้ด'),
            'name' => Yii::t('app', 'ชื่อสินค้า'),
            'detail' => Yii::t('app', 'รายละเอียดสินค้า'),
            'price' => Yii::t('app', 'ราคา'),
            'price2' => Yii::t('app', 'ราคาสมาชิก'),
            'qty' => Yii::t('app', 'จำนวน'),
            'type_id' => Yii::t('app', 'ประเภทสินค้า'),
            'pro_id' => Yii::t('app', 'หมวดหมู่'),
            'color_id' => Yii::t('app', 'สี'),
            'image' => Yii::t('app', 'รูปภาพสินค้า'),
            'size_id' => Yii::t('app', 'size'),
            'brand_id' => Yii::t('app', 'แบรนด์สินค้า'),
            'create_at' => Yii::t('app', 'สร้างเมื่อวันที่'),
            'create_by' => Yii::t('app', 'สร้างโดย'),
            'update_at' => Yii::t('app', 'แก้ไขเมื่อวันที่'),
            'update_by' => Yii::t('app', 'แก้ไขโดย'),
        ]; 
    }
    public function getSizes(){
        return $this->hasOne(ESizes::className(),['id'=>'size_id']);
    }
    public function getTypes(){
        return $this->hasOne(Types::className(),['id'=>'type_id']);
    }
}
