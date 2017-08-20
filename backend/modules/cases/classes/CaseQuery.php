<?php
namespace backend\modules\cases\classes;

use backend\modules\cases\models\CaseType;
use backend\modules\cases\models\CaseItemsType;
use backend\modules\cases\models\CaseItems;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CaseQuery
 *
 * @author appxq
 */
class CaseQuery {
    public static function getWeight($tableName, $weight='weight'){
        $query = new \yii\db\Query();
        $query->select("max($weight)")
                ->from($tableName);
        $data = $query->createCommand()->queryScalar();
        
        return $data+10;
    }
    
    public static function getCaseType(){
        $model = CaseType::find()->where('active=1')->all();
        
        return $model;
    }
    
    public static function getCaseItemsType($group){
        $model = CaseItemsType::find()->andFilterWhere(['=', 'group', $group])->all();
        
        return $model;
    }
    
    public static function getCaseItemsByItem($field, $id){
        $model = CaseItems::find()->andFilterWhere(['=', $field, $id])->one();
        
        return $model;
    }
    
    public static function getCaseItemsByCaseAll($case){
        $model = CaseItems::find()->andFilterWhere(['=', 'case_id', $case])->all();
        
        return $model;
    }
    
    public static function deleteCaseItems($case){
        return \Yii::$app->db->createCommand()->delete('case_items', 'case_id=:case_id', [':case_id'=>$case])->execute();
    }
    
}
