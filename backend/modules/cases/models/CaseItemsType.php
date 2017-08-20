<?php

namespace backend\modules\cases\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "case_items_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $group
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class CaseItemsType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'case_items_type';
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
            [['id', 'name'], 'required'],
            [['id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'group'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'name' => Yii::t('app', 'Name'),
	    'group' => Yii::t('app', 'Group'),
	    'created_at' => Yii::t('app', 'Created At'),
	    'updated_at' => Yii::t('app', 'Updated At'),
	    'created_by' => Yii::t('app', 'Created By'),
	    'updated_by' => Yii::t('app', 'Updated By'),
	];
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
    public function getUpdatedBy()
    {
	return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
