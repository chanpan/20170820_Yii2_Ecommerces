<?php

namespace backend\modules\cases\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "notify".
 *
 * @property integer $id
 * @property string $notify_choice
 * @property string $notify_no
 * @property string $write_at
 * @property string $notify_date
 * @property string $notify_from
 * @property integer $notify_from_type
 * @property integer $case_type_id
 * @property string $case_type_other
 * @property string $location_text
 * @property string $sdate
 * @property string $stime
 * @property string $edate
 * @property string $etime
 * @property string $time_total
 * @property string $desc
 * @property string $emp_name
 * @property string $emp_tel
 * @property string $sufferer_name
 * @property string $sufferer_tel
 * @property integer $status
 * @property string $content
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 */
class Notify extends \yii\db\ActiveRecord
{
	public $case_count;
	public $files;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
			return 'notify';
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
								'uploads' => [
									'class' => 'trntv\filekit\behaviors\UploadBehavior',
									'filesStorage' => 'fileStorage', 
									'multiple' => true,
									'attribute' => 'files',
									'uploadRelation' => 'notifyAttachments',
									 'pathAttribute' => 'path',
									'baseUrlAttribute' => 'base_url',
									'typeAttribute' => 'type',
									'sizeAttribute' => 'size',
									'nameAttribute' => 'name',
									'orderAttribute' => 'order'
							],
				];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
	return [
            [['id', 'notify_no', 'write_at','notify_date','notify_from','notify_from_type','case_type_id','name','notify_choice'], 'required'],
            [['id', 'notify_from_type', 'case_type_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['notify_date', 'sdate', 'stime', 'edate', 'etime', 'created_at', 'updated_at','case_count','files'], 'safe'],
            [['location_text', 'desc', 'content'], 'string'],
            [['notify_choice', 'notify_no', 'emp_tel', 'sufferer_tel'], 'string', 'max' => 50],
            [['write_at', 'notify_from', 'case_type_other', 'emp_name', 'sufferer_name','name'], 'string', 'max' => 255],
            [['time_total'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
				return [
						'id' => Yii::t('app', 'ID'),
						'notify_choice' => Yii::t('app', 'ปวจ. ข้อ'),
						'notify_no' => Yii::t('app', 'เลขรับแจ้งเหตุ'),
						'write_at' => Yii::t('app', 'เขียนที่'),
						'notify_date' => Yii::t('app', 'เมื่อวันที่'),
						'notify_from' => Yii::t('app', 'รับแจ้งเหตุจาก (สภ/สน)'),
						'notify_from_type' => Yii::t('app', 'ทาง'),
						'case_type_id' => Yii::t('app', 'เหตุที่รับแจ้ง'),
						'case_type_other' => Yii::t('app', 'ระบุ'),
						'location_text' => Yii::t('app', 'สถานที่เกิดเหตุ'),
						'sdate' => Yii::t('app', 'วันที่เกิดเหตุ'),
						'stime' => Yii::t('app', 'เวลาประมาณ'),
						'edate' => Yii::t('app', 'วันที่ถึงที่เกิดเหตุ'),
						'etime' => Yii::t('app', 'เวลาถึงที่เกิดเหตุ'),
						'time_total' => Yii::t('app', 'ใช้เวลาประมาณ'),
						'desc' => Yii::t('app', 'ข้อมูลเบื้องต้น'),
						'emp_name' => Yii::t('app', 'พนักงานสอบสวน'),
						'emp_tel' => Yii::t('app', 'เบอร์โทรศัพท์'),
						'sufferer_name' => Yii::t('app', 'ผู้เสียหาย'),
						'sufferer_tel' => Yii::t('app', 'เบอร์โทรศัพท์'),
						'status' => Yii::t('app', 'สถานะ'),
						'content' => Yii::t('app', 'Content'),
						'created_at' => Yii::t('app', 'สร้างวันที่'),
						'updated_at' => Yii::t('app', 'แก้ไขวันที่'),
						'created_by' => Yii::t('app', 'บันทึกโดย'),
						'updated_by' => Yii::t('app', 'แก้ไขโดย'),
						'caseTypeName' => Yii::t('app', 'เหตุที่รับแจ้ง'),
						'name' => Yii::t('app', 'เรื่อง'),
						'attachments' => Yii::t('app', 'ภาพถ่าย'),
				];
    }

    public function afterDelete()
    {
				$model = Cases::find()->where(['notify_id'=>$this->id])->one();
				if($model !== null){
					$model->delete();
				}
				parent::afterDelete();
		}

    public function getRelationName($relationName,$attribute,$defaultValue=null)
    {
	    return isset($this->$relationName) ? $this->$relationName->$attribute : $defaultValue;
    }

	public function getCaseType(){
		return $this->hasOne(CaseType::className(),['id'=>'case_type_id']);
	}

	public function getNotifyAttachments(){
		return $this->hasMany(NotifyAttachments::className(),['ref_id'=>'id']);
	}
	
	public function getCaseTypeName(){
		return $this->getRelationName('caseType','name');
	} 
	
}
