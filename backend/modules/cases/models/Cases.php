<?php

namespace backend\modules\cases\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use common\modules\user\models\User;

/**
 * This is the model class for table "case".
 *
 * @property integer $id
 * @property integer $report_of
 * @property integer $case_type_id
 * @property string $name
 * @property string $description
 * @property string $occurred_at
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property CaseType $caseType
 * @property User $createdBy
 * @property Cases $reportOf
 * @property Cases[] $cases
 * @property User $updatedBy
 */
class Cases extends \yii\db\ActiveRecord
{
    public $item_count;
    public $place_count;
    public $person_count;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'cases';
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
            [['id', 'name', 'occurred_at'], 'required'],
            [['id', 'report_of', 'case_type_id', 'active', 'created_by', 'updated_by','notify_id'], 'integer'],
            [['description'], 'string'],
            [['occurred_at', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'report_of' => Yii::t('app', 'เชื่อมกับเคส'),
	    'case_type_id' => Yii::t('app', 'ประเภท'),
	    'name' => Yii::t('app', 'เรื่อง'),
	    'description' => Yii::t('app', 'รายละเอียด'),
	    'occurred_at' => Yii::t('app', 'วันเวลาที่เกิดเหตุ'),
	    'active' => Yii::t('app', 'Active'),
	    'created_at' => Yii::t('app', 'Created At'),
	    'updated_at' => Yii::t('app', 'อัพเดทล่าสุด'),
	    'created_by' => Yii::t('app', 'Created By'),
	    'updated_by' => Yii::t('app', 'Updated By'),
	];
    }
    
    public function afterDelete()
    {
        $modelCaseItemsAll = \backend\modules\cases\classes\CaseQuery::getCaseItemsByCaseAll($this->id);
        if($modelCaseItemsAll){
            foreach ($modelCaseItemsAll as $key => $value) {
                if($value['item_id']>0){
                    $modelItem = \backend\modules\items\models\Item::find()->where('id=:id', [':id'=>$value['item_id']])->one();
                    if($modelItem){
                        $modelItem->delete();
                        //\backend\modules\cases\classes\CaseQuery::deleteCaseItems($value['case_id']);
                    }
                }

                if($value['place_id']>0){
                    $modelPlace = \backend\modules\places\models\Place::find()->where('id=:id', [':id'=>$value['place_id']])->one();
                    if($modelPlace){
                        $modelPlace->delete();
                        //\backend\modules\cases\classes\CaseQuery::deleteCaseItems($value['case_id']);
                    }
                }

                if($value['person_id']>0){
                     $modelPlace = \backend\modules\persons\models\Person::find()->where('id=:id', [':id'=>$value['person_id']])->one();
                    if($modelPlace){
                        $modelPlace->delete();
                        //\backend\modules\cases\classes\CaseQuery::deleteCaseItems($value['case_id']);
                    }
                }

            }
        }
        
	parent::afterDelete();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaseType()
    {
	return $this->hasOne(CaseType::className(), ['id' => 'case_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
	return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportOf()
    {
	return $this->hasOne(Cases::className(), ['id' => 'report_of']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCases()
    {
	return $this->hasMany(Cases::className(), ['report_of' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
	return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
