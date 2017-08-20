<?php

namespace backend\modules\items\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property integer $item_group_id
 * @property string $name
 * @property string $description
 * @property string $identification1
 * @property string $identification2
 * @property string $identification3
 * @property string $identification4
 * @property string $identification5
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Item extends \yii\db\ActiveRecord
{
    public $case_items_type_id;
    public $case_id;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'item';
    }

    public function behaviors() {
            return [
                    [
                            'class' => TimestampBehavior::className(),
                            'value' => new Expression('NOW()'),
                    ],
                    [
                            'class' => BlameableBehavior::className(),
                    ],
            ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
	return [
            [['id', 'item_group_id', 'name'], 'required'],
            [['id', 'item_group_id', 'active', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['case_items_type_id', 'case_id'], 'safe'],
            [['name', 'description', 'identification1', 'identification2', 'identification3', 'identification4', 'identification5'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'item_group_id' => Yii::t('app', 'กลุ่ม'),
	    'name' => Yii::t('app', 'ชื่อ'),
	    'description' => Yii::t('app', 'รายละเอียด'),
	    'identification1' => Yii::t('app', 'ข้อมูลยืนยันสิ่งของ 1'),
	    'identification2' => Yii::t('app', 'ข้อมูลยืนยันสิ่งของ 2'),
	    'identification3' => Yii::t('app', 'ข้อมูลยืนยันสิ่งของ 3'),
	    'identification4' => Yii::t('app', 'ข้อมูลยืนยันสิ่งของ 4'),
	    'identification5' => Yii::t('app', 'ข้อมูลยืนยันสิ่งของ 5'),
	    'active' => Yii::t('app', 'Active'),
	    'created_at' => Yii::t('app', 'Created At'),
	    'updated_at' => Yii::t('app', 'อัพเดทล่าสุด'),
	    'created_by' => Yii::t('app', 'Created By'),
	    'updated_by' => Yii::t('app', 'Updated By'),
            'case_items_type_id' => Yii::t('app', 'ประเภท'),
	];
    }
    
    public function afterDelete()
    {
        $modelCaseItems = \backend\modules\cases\classes\CaseQuery::getCaseItemsByItem('item_id', $this->id);
        if($modelCaseItems){
            $modelCaseItems->delete();
        }
        
	parent::afterDelete();
    }
    
}
