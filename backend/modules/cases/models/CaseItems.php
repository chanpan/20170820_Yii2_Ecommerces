<?php

namespace backend\modules\cases\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use common\modules\user\models\User;

/**
 * This is the model class for table "case_items".
 *
 * @property integer $id
 * @property integer $case_items_type_id
 * @property integer $case_id
 * @property integer $item_id
 * @property integer $place_id
 * @property integer $person_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class CaseItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'case_items';
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
            [['id', 'case_items_type_id', 'case_id'], 'required'],
            [['id', 'case_items_type_id', 'case_id', 'item_id', 'place_id', 'person_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'case_items_type_id' => Yii::t('app', 'Case Items Type ID'),
	    'case_id' => Yii::t('app', 'Case ID'),
	    'item_id' => Yii::t('app', 'Item ID'),
	    'place_id' => Yii::t('app', 'Place ID'),
	    'person_id' => Yii::t('app', 'Person ID'),
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
