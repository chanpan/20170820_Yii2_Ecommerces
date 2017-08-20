<?php

namespace backend\modules\cases\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "notify_attachments".
 *
 * @property integer $id
 * @property integer $ref_id
 * @property string $code
 * @property string $desc
 * @property string $comment
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property integer $created_at
 */
class NotifyAttachments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	    return 'notify_attachments';
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'created_at',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
	return [
            [['ref_id', 'code', 'desc', 'comment', 'path'], 'required'],
            [['ref_id', 'size', 'created_at'], 'integer'],
            [['desc'], 'string'],
            [['code'], 'string', 'max' => 10],
            [['comment', 'path', 'base_url', 'type', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'ref_id' => Yii::t('app', 'Ref ID'),
	    'code' => Yii::t('app', 'Code'),
	    'desc' => Yii::t('app', 'Desc'),
	    'comment' => Yii::t('app', 'Comment'),
	    'path' => Yii::t('app', 'Path'),
	    'base_url' => Yii::t('app', 'Base Url'),
	    'type' => Yii::t('app', 'Type'),
	    'size' => Yii::t('app', 'Size'),
	    'name' => Yii::t('app', 'Name'),
	    'created_at' => Yii::t('app', 'Created At'),
	];
    }

    /**
     * @inheritdoc
     * @return NotifyAttachmentsQuery the active query used by this AR class.
     */
    public static function find()
    {
	return new NotifyAttachmentsQuery(get_called_class());
    }
}
