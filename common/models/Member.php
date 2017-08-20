<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "e_member".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $prefix
 * @property string $fname
 * @property string $lname
 * @property integer $gender
 * @property string $birthday
 * @property string $email
 * @property string $address
 * @property string $province
 * @property string $amphur
 * @property string $district
 * @property integer $zipcode
 * @property string $ident_number
 * @property integer $status
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'e_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username', 'password'], 'required'],
            [['gender', 'zipcode', 'status'], 'integer'],
            [['birthday'], 'safe'],
            [['id', 'prefix', 'fname', 'lname'], 'string', 'max' => 255],
            [['username', 'password', 'email', 'address', 'province', 'amphur', 'district'], 'string', 'max' => 100],
            [['ident_number'], 'string', 'max' => 2255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัสสมาชิก'),
            'username' => Yii::t('app', 'ชื่อผู้ใช้งาน'),
            'password' => Yii::t('app', 'รหัสผ่าน'),
            'prefix' => Yii::t('app', 'คำนำหน้า'),
            'fname' => Yii::t('app', 'ชื่อ'),
            'lname' => Yii::t('app', 'นามสกุล'),
            'gender' => Yii::t('app', 'เพศ'),
            'birthday' => Yii::t('app', 'วันเกิด'),
            'email' => Yii::t('app', 'E-mail'),
            'address' => Yii::t('app', 'ที่อยู่'),
            'province' => Yii::t('app', 'จังหวัด'),
            'amphur' => Yii::t('app', 'อำเภอ'),
            'district' => Yii::t('app', 'ตำบล'),
            'zipcode' => Yii::t('app', 'รหัสไปรษณีย์'),
            'ident_number' => Yii::t('app', 'เลขประจำตัวผู้เสียภาษี'),
            'status' => Yii::t('app', 'สถานะสมาชิก'),
        ];
    }
}
