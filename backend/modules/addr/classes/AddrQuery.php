<?php
namespace backend\modules\addr\classes;

use Yii;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddrQuery
 *
 * @author appxq
 */
class AddrQuery {
    public static function getProvince(){
        $model = \backend\modules\addr\models\AddrProvince::find()->all();
        
        return $model;
    }
    
    public static function getDistrict($q){
        $sql = "SELECT id, `name` as text FROM `addr_district` WHERE `name` LIKE :q limit 20";
        $data = Yii::$app->db->createCommand($sql, [':q'=>"%$q%"])->queryAll();
            
//        $model = \backend\modules\addr\models\AddrDistrict::find()
//                ->select('id, `name` as text')
//                ->where('`name` LIKE :q', [':q'=>"%$q%"])
//                ->limit(20)
//                ->all();
        
        return $data;
    }
    
     public static function getSubdistrict($q){
        $sql = "SELECT id, `name` as text FROM `addr_subdistrict` WHERE `name` LIKE :q limit 20";
        $data = Yii::$app->db->createCommand($sql, [':q'=>"%$q%"])->queryAll();
           
        return $data;
    }
    
}
