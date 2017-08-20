<?php

namespace backend\modules\ecommerce\classest;

use Yii;

class ProductClass {
    
    public static function getAutoIdProduct() {
        $model = \backend\modules\ecommerce\models\Product::find()->orderBy(["id" => SORT_DESC])->one();
        $id = 1000;
        if (!empty($model)) {
            $id = (int) $model->id + 1;
        }
        return (string) $id;
    }

//รหัสสินค้า +1

    public static function getColorProduct() {
        $model = \backend\modules\ecommerce\models\EColors::find()->orderBy(["id" => SORT_DESC])->one();
        $id = 100000;
        if (!empty($model)) {
            $id = (int) $model->id;
        }
        return $id;
    }

//ไม่เลือกสีใดๆ

    public static function InsertProduct($data) {
        
        $sql="INSERT INTO e_product(id,pid,name,price,type_id,color_id,size_id,create_at,create_by) 
                    VALUES(:id,:pid,:name,:price,:type_id,:color_id,:size_id,:create_at,:create_by)";
        $query=\Yii::$app->db->createCommand($sql,$data)->execute();
    }

    public static function getCreateAt() {
        //2017-08-16 23:44:51
        return Date("Y-m-d H:i:s");
    }

//วันที่สร้าง

    public static function getCreateBy() {
        //2017-08-16 23:44:51
        return \Yii::$app->user->identity->id;
    }
    
    public static function saveDeleteImage($name, $table=""){
        //$name="15032036105999111a1e0373.44308499.jpg";
        if($table == ""){
           $sql="SELECT * FROM e_product WHERE image like '%".$name."%' "; 
        }else{
            $sql="SELECT * FROM $table WHERE image like '%".$name."%' ";
        }
        
        $images = \Yii::$app->db->createCommand($sql)->queryOne();
        $id='';
        $arr=[];
        if(!empty($images)){
            $id = $images["id"];
            $img_name = explode(",",$images["image"]);
            for($i=0; $i<count($img_name); $i++){
                if($img_name[$i] != $name){
                    array_push($arr, $img_name[$i]);
                    
                }
            }
            $out = "";
            if(count($arr) > 1){
                $out = implode(",", $arr);
            }else{
                $out = $arr[0];
            }
            if($table == ""){
                $sql="UPDATE e_product SET image=:image WHERE id=:id";
             }else{
                $sql="UPDATE $table SET image=:image WHERE id=:id"; 
                 
             }
            
            return \Yii::$app->db->createCommand($sql,[":image"=>$out,":id"=>$id])->execute();
        }
    }

//วันที่สร้าง
}
