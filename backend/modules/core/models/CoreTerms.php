<?php

namespace backend\modules\core\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use backend\modules\core\models\CoreTermTaxonomy;

/**
 * This is the model class for table "core_terms".
 *
 * @property string $term_id
 * @property string $name
 * @property string $slug
 * @property integer $term_group
 */

class CoreTerms extends \yii\db\ActiveRecord
{
    public $tagsForm = [];
    
    public function behaviors()
    {
	return [
	    [
		'class' => SluggableBehavior::className(),
		'attribute' => 'name',
		'ensureUnique' => true,
		'immutable' => false,
	    ],
	];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
	return 'core_terms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
	return [
            [['term_group'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 200],
            [['slug'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
	return [
	    'term_id' => Yii::t('app', 'ID'),
	    'name' => Yii::t('app', 'Name'),
	    'slug' => Yii::t('app', 'Slug'),
	    'term_group' => Yii::t('app', 'Group'),
	];
    }
    
    public function afterSave($insert, $changedAttributes)
    {
	$tagsForm = $this->tagsForm;
        
	if(!empty($tagsForm)){
	    $model = new CoreTermTaxonomy;

	    if(isset($tagsForm->term_taxonomy_id) && !empty($tagsForm->term_taxonomy_id)){
		$model = CoreTermTaxonomy::findOne($tagsForm->term_taxonomy_id);
	    } 
	    $model->attributes = $tagsForm->attributes;
	    if($insert){
		$model->term_id = (int) $this->term_id;
                
                if($model->taxonomy == 'item_group'){
                    $model_itemiden = new \backend\modules\items\models\ItemIdentName();
                    $model_itemiden->id = \appxq\sdii\utils\SDUtility::getMillisecTime();
                    $model_itemiden->term_taxonomy_id = $this->term_id;
                    $model_itemiden->identification1_name = 'ข้อมูลยืนยันสิ่งของ 1';
                    $model_itemiden->identification2_name = 'ข้อมูลยืนยันสิ่งของ 2';
                    $model_itemiden->identification3_name = 'ข้อมูลยืนยันสิ่งของ 3';

                    $model_itemiden->save();
                }
	    }
	    $model->parent = (int) $tagsForm->parent;
	    $model->count = (int) $tagsForm->count;
	    
	    $model->save();
            
	}
	
        parent::afterSave($insert, $changedAttributes);
    }
    
    public function afterDelete()
    {
	$model = CoreTermTaxonomy::find()->where('term_id=:id', ['id'=>$this->term_id])->one();
        
        if($model->taxonomy=='item_group'){
            $model_itemiden = \backend\modules\items\models\ItemIdentName::find()->where('term_taxonomy_id=:id', ['id'=>$model->term_id])->one();
            $model_itemiden->delete();
        }
        
	$model->delete();
	Yii::$app->db->createCommand()
		->update('core_term_taxonomy', ['parent'=>$model->parent], 'parent=:id', [':id'=>$this->term_id])
		->execute();
	Yii::$app->db->createCommand()
		->delete('core_term_relationships', 'term_taxonomy_id=:id', [':id' => $model->term_taxonomy_id])
		->execute();
        
	parent::afterDelete();
    }
}
