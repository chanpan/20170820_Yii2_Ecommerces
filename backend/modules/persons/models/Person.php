<?php

namespace backend\modules\persons\models;

use Yii;
use  common\modules\user\models\User;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property integer $person_group_id
 * @property integer $image_id
 * @property string $id_number
 * @property string $id_card_issue_date
 * @property string $id_card_issue_at
 * @property string $id_card_expiry_date
 * @property string $passport_number
 * @property string $th_title_name
 * @property string $th_first_name
 * @property string $th_middle_name
 * @property string $th_last_name
 * @property string $th_nickname
 * @property string $en_title_name
 * @property string $en_first_name
 * @property string $en_middle_name
 * @property string $en_last_name
 * @property string $en_nickname
 * @property integer $raceId
 * @property integer $nationality_id
 * @property integer $blood_type_id
 * @property integer $religion_id
 * @property integer $gender_id
 * @property integer $military_status_id
 * @property integer $marriage_status_id
 * @property string $birthdate
 * @property string $occupation
 * @property string $address
 * @property integer $subdistrictId
 * @property integer $districtId
 * @property integer $province_id
 * @property integer $country_id
 * @property string $postal_code
 * @property string $phone_number
 * @property string $mobile_number
 * @property string $work_number
 * @property string $fax_number
 * @property string $other_number
 * @property string $email
 * @property string $facebook
 * @property string $twitter
 * @property string $line
 * @property string $note
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property PersonBloodType $bloodType
 * @property AddrCountry $country
 * @property User $createdBy
 * @property AddrDistrict $district
 * @property PersonGender $gender
 * @property PersonMarriageStatus $marriageStatus
 * @property PersonMilitaryStatus $militaryStatus
 * @property PersonNationality $nationality
 * @property PersonGroup $personGroup
 * @property AddrProvince $province
 * @property PersonRace $race
 * @property PersonReligion $religion
 * @property AddrSubdistrict $subdistrict
 * @property User $updatedBy
 */
class Person extends \yii\db\ActiveRecord
{
    public $case_items_type_id;
    public $case_id;
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	    return 'person';
    }

    public function behaviors(){
        return [
            BlameableBehavior::className(),
            'file' => [
                'class' => 'trntv\filekit\behaviors\UploadBehavior',
                'filesStorage' => 'fileStorage',
                'attribute' => 'file',
                'pathAttribute' => 'photo_path',
                'baseUrlAttribute' => 'photo_url'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
	return [
            [['id_number','person_group_id'], 'required'],
            [['case_items_type_id', 'case_id','file'], 'safe'],
            [['id', 'image_id', 'raceId', 'nationality_id', 'blood_type_id', 'religion_id', 'gender_id', 'military_status_id', 'marriage_status_id', 'subdistrictId', 'districtId', 'province_id', 'country_id', 'active', 'created_by', 'updated_by'], 'integer'],
            [['person_group_id','id_card_issue_date', 'id_card_expiry_date', 'birthdate', 'created_at', 'updated_at'], 'safe'],
            [['address', 'note'], 'string'],
            [['id_number', 'id_card_issue_at', 'passport_number', 'th_title_name', 'th_first_name', 'th_middle_name', 'th_last_name', 'th_nickname', 'en_title_name', 'en_first_name', 'en_middle_name', 'en_last_name', 'en_nickname', 'occupation', 'postal_code', 'phone_number', 'mobile_number', 'work_number', 'fax_number', 'other_number', 'email', 'facebook', 'twitter', 'line','photo_path','photo_url'], 'string', 'max' => 255],
            [['blood_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BloodType::className(), 'targetAttribute' => ['blood_type_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['districtId'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['districtId' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['marriage_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => MarriageStatus::className(), 'targetAttribute' => ['marriage_status_id' => 'id']],
            [['military_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => MilitaryStatus::className(), 'targetAttribute' => ['military_status_id' => 'id']],
            [['nationality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nationality::className(), 'targetAttribute' => ['nationality_id' => 'id']],
            //[['person_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['person_group_id' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['province_id' => 'id']],
            [['raceId'], 'exist', 'skipOnError' => true, 'targetClass' => Race::className(), 'targetAttribute' => ['raceId' => 'id']],
            [['religion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Religion::className(), 'targetAttribute' => ['religion_id' => 'id']],
            [['subdistrictId'], 'exist', 'skipOnError' => true, 'targetClass' => Subdistrict::className(), 'targetAttribute' => ['subdistrictId' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => 'ID',
	    'person_group_id' => 'Person Group ID',
	    'image_id' => 'Image ID',
	    'id_number' => 'หมายเลขบัตรประชาชน',
	    'id_card_issue_date' => 'วันที่ออกบัตรประชาชน',
	    'id_card_issue_at' => 'สถานที่ออกบัตร',
	    'id_card_expiry_date' => 'วันที่หมดอายุ',
	    'passport_number' => 'หมายเลขพาสปอร์ต',
	    'th_title_name' => 'คำนำหน้า (Th)',
	    'th_first_name' => 'ชื่อ (Th)',
	    'th_middle_name' => 'ชื่อกลาง (Th)',
	    'th_last_name' => 'นามสกุล (Th)',
	    'th_nickname' => 'ชื่อเล่น (Th)',
	    'en_title_name' => 'คำนำหน้า (En)',
	    'en_first_name' => 'ชื่อ (En)',
	    'en_middle_name' => 'ชื่อกลาง (En)',
	    'en_last_name' => 'นามสกุล (En)',
	    'en_nickname' => 'ชื่อเล่น (En)',
	    'raceId' => 'เชื้อชาติ',
	    'raceText' => 'เชื้อชาติ',
	    'nationalityText' => 'สัญชาติ',
	    'nationality_id' => 'สัญชาติ',
	    'blood_type_id' => 'กรุ๊ฟเลือด',
	    'bloodTypeText' => 'กรุ๊ฟเลือด',
	    'religion_id' => 'ศาสนา',
	    'religionText' => 'ศาสนา',
	    'gender_id' => 'เพศ',
	    'genderText' => 'เพศ',
	    'military_status_id' => 'สถานภาพทางทหาร',
	    'militaryStatusText' => 'สถานภาพทางทหาร',
	    'marriage_status_id' => 'สถานภาพสมรส',
	    'marriageStatusText' => 'สถานภาพสมรส',
	    'birthdate' => 'วันเกิด',
	    'occupation' => 'อาชีพ',
	    'address' => 'ที่อยู่',
	    'subdistrictId' => 'ตำบล',
	    'subdistrictText' => 'ตำบล',
	    'districtId' => 'อำเภอ',
	    'districtText' => 'อำเภอ',
	    'province_id' => 'จังหวัด',
	    'provinceText' => 'จังหวัด',
	    'country_id' => 'ประเทศ',
	    'countryText' => 'ประเทศ',
	    'postal_code' => 'รหัสไปษณีย์',
	    'phone_number' => 'หมายเลขโทรศัพท์',
	    'mobile_number' => 'หมายเลขโทรศัพท์มือถือ',
	    'work_number' => 'หมายเลขโทรศัพท์บ้าน',
	    'fax_number' => 'หมายเลขแฟกซ์',
	    'other_number' => 'อื่นๆ ',
	    'email' => 'อีเมล',
	    'facebook' => 'Facebook',
	    'twitter' => 'Twitter',
	    'line' => 'Line',
	    'note' => 'หมาเหตุ',
	    'active' => 'Active',
	    'created_at' => 'สร้างวันที่',
	    'updated_at' => 'แก้ไขวันที่',
	    'created_by' => 'บันทึกโดย',
	    'updated_by' => 'แก้ไขโดย',
         'fullNameTH' => 'ชื่อ-นามสกุล (Th)',
         'fullNameEN' => 'ชื่อ-นามสกุล (En)',
         'case_items_type_id' => Yii::t('app', 'ประเภท'),
         'file' => Yii::t('app', 'ภาพถ่าย'),
	];
    }

    public function getFullNameTH(){
        return $this->th_title_name.$this->th_first_name.' '.$this->th_middle_name.' '.$this->th_last_name;
    }
    public function getFullNameEN(){
        return $this->en_title_name.$this->en_first_name.' '.$this->en_middle_name.' '.$this->en_last_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBloodType()
    {
	    return $this->hasOne(BloodType::className(), ['id' => 'blood_type_id']);
    }
    public function getBloodTypeText()
    {
        return $this->getRelationName('bloodType','name');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
	return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
    public function getCountryText()
    {
        return $this->getRelationName('country','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
	return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getCreatedByName()
    {
	    return isset($this->createdBy) ? $this->createdBy->username : null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
	return $this->hasOne(District::className(), ['id' => 'districtId']);
    }
    public function getDistrictText()
    {
        return $this->getRelationName('district','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
	return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }
    public function getGenderText()
    {
        return $this->getRelationName('gender','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarriageStatus()
    {
	return $this->hasOne(MarriageStatus::className(), ['id' => 'marriage_status_id']);
    }
    public function getMarriageStatusText()
    {
        return $this->getRelationName('marriageStatus','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMilitaryStatus()
    {
	return $this->hasOne(MilitaryStatus::className(), ['id' => 'military_status_id']);
    }
    public function getMilitaryStatusText()
    {
        return $this->getRelationName('militaryStatus','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNationality()
    {
	return $this->hasOne(Nationality::className(), ['id' => 'nationality_id']);
    }
    public function getNationalityText()
    {
        return $this->getRelationName('nationality','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getGroup()
    // {
	//     return $this->hasOne(Group::className(), ['id' => 'person_group_id']);
    // }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
	    return $this->hasOne(Province::className(), ['id' => 'province_id']);
    }
    public function getProvinceText()
    {
        return $this->getRelationName('province','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRace()
    {
	return $this->hasOne(Race::className(), ['id' => 'raceId']);
    }

    public function getRaceText()
    {
        return $this->getRelationName('race','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReligion()
    {
	return $this->hasOne(Religion::className(), ['id' => 'religion_id']);
    }
    public function getReligionText()
    {
        return $this->getRelationName('religion','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubdistrict()
    {
	return $this->hasOne(Subdistrict::className(), ['id' => 'subdistrictId']);
    }
    public function getSubdistrictText()
    {
        return $this->getRelationName('subdistrict','name');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
	return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    public function getUpdatedByName()
    {
	    return isset($this->updatedBy) ? $this->updatedBy->username : null;
    }

    public function getRelationName($relationName,$attribute)
    {
	    return isset($this->$relationName) ? $this->$relationName->$attribute : null;
    }


    /**
     * @inheritdoc
     * @return PersonQuery the active query used by this AR class.
     */
    public static function find()
    {
	    return new PersonQuery(get_called_class());
    }

    public function afterDelete()
    {
        $modelCaseItems = \backend\modules\cases\classes\CaseQuery::getCaseItemsByItem('person_id', $this->id);
        if($modelCaseItems) {
            $modelCaseItems->delete();
        }
	parent::afterDelete();
    }
}
