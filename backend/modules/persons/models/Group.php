<?php

namespace backend\modules\persons\models;

use Yii;

/**
 * This is the model class for table "person_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $parent_group_id
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Person[] $people
 * @property User $createdBy
 * @property Group $parentGroup
 * @property Group[] $groups
 * @property User $updatedBy
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'person_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
	return [
            [['id', 'name'], 'required'],
            [['id', 'parent_group_id', 'active', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => \common\modules\user\models\User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['parent_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['parent_group_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => \common\modules\user\models\User::className(), 'targetAttribute' => ['updated_by' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'id' => 'ID',
	    'name' => 'Name',
	    'description' => 'Description',
	    'parent_group_id' => 'Parent Group ID',
	    'active' => 'Active',
	    'created_at' => 'Created At',
	    'updated_at' => 'Updated At',
	    'created_by' => 'Created By',
	    'updated_by' => 'Updated By',
	];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
	return $this->hasMany(Person::className(), ['person_group_id' => 'id']);
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
    public function getParentGroup()
    {
	return $this->hasOne(Group::className(), ['id' => 'parent_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
	return $this->hasMany(Group::className(), ['parent_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
	return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @inheritdoc
     * @return GroupQuery the active query used by this AR class.
     */
    public static function find()
    {
	return new GroupQuery(get_called_class());
    }
}
