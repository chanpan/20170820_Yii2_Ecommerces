<?php

namespace backend\modules\cases\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "case_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $weight
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Case[] $cases
 * @property User $createdBy
 * @property User $updatedBy
 */
class CaseType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'case_type';
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
            [['id', 'weight', 'active', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
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
	    'name' => Yii::t('app', 'Name'),
	    'description' => Yii::t('app', 'Description'),
	    'weight' => Yii::t('app', 'Weight'),
	    'active' => Yii::t('app', 'Active'),
	    'created_at' => Yii::t('app', 'Created At'),
	    'updated_at' => Yii::t('app', 'Updated At'),
	    'created_by' => Yii::t('app', 'Created By'),
	    'updated_by' => Yii::t('app', 'Updated By'),
	];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCases()
    {
	return $this->hasMany(Cases::className(), ['case_type_id' => 'id']);
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
