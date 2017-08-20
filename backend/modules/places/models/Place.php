<?php

namespace backend\modules\places\models;

use Yii;
use common\modules\user\models\User;
use backend\modules\addr\models\AddrSubdistrict;
use backend\modules\addr\models\AddrProvince;
use backend\modules\addr\models\AddrDistrict;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "place".
 *
 * @property integer $id
 * @property integer $place_group_id
 * @property string $name
 * @property string $description
 * @property string $facility
 * @property integer $subdistrict_id
 * @property integer $district_id
 * @property integer $province_id
 * @property string $postal_code
 * @property double $latitude
 * @property double $longitude
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property User $createdBy
 * @property AddrDistrict $district
 * @property AddrProvince $province
 * @property AddrSubdistrict $subdistrict
 * @property User $updatedBy
 */
class Place extends \yii\db\ActiveRecord
{
    public $case_items_type_id;
    public $case_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'place';
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
            [['id', 'name', 'place_group_id'], 'required'],
            [['id', 'place_group_id', 'subdistrict_id', 'district_id', 'province_id', 'active', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['case_items_type_id', 'case_id'], 'safe'],
            [['name', 'facility', 'postal_code'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => AddrDistrict::className(), 'targetAttribute' => ['district_id' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => AddrProvince::className(), 'targetAttribute' => ['province_id' => 'id']],
            [['subdistrict_id'], 'exist', 'skipOnError' => true, 'targetClass' => AddrSubdistrict::className(), 'targetAttribute' => ['subdistrict_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'place_group_id' => Yii::t('app', 'กลุ่ม'),
	    'name' => Yii::t('app', 'ชื่อ'),
	    'description' => Yii::t('app', 'รายละเอียด'),
	    'facility' => Yii::t('app', 'Facility'),
	    'subdistrict_id' => Yii::t('app', 'ตำบล'),
	    'district_id' => Yii::t('app', 'อำเภอ'),
	    'province_id' => Yii::t('app', 'จังหวัด'),
	    'postal_code' => Yii::t('app', 'รหัสไปรษณีย์'),
	    'latitude' => Yii::t('app', 'Latitude'),
	    'longitude' => Yii::t('app', 'Longitude'),
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
        $modelCaseItems = \backend\modules\cases\classes\CaseQuery::getCaseItemsByItem('place_id', $this->id);
        if($modelCaseItems){
            $modelCaseItems->delete();
        }
        
	parent::afterDelete();
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
    public function getDistrict()
    {
	return $this->hasOne(AddrDistrict::className(), ['id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
	return $this->hasOne(AddrProvince::className(), ['id' => 'province_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubdistrict()
    {
	return $this->hasOne(AddrSubdistrict::className(), ['id' => 'subdistrict_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
	return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
