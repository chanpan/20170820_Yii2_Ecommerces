<?php
namespace backend\modules\core\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Json;

class ProvinceController extends Controller{
    
    public function actionGetProvince($q = null, $id = null) {
	Yii::$app->response->format = Response::FORMAT_JSON;
	$out = ['results' => ''];
	if (is_null($id)) {
	    $sql = "SELECT id, code,`name` AS text FROM `addr_province` WHERE `name` LIKE :q limit 20";
	    $data = Yii::$app->db->createCommand($sql, [':q'=>"%$q%"])->queryAll();
	    $out['results'] = array_values($data);
	} elseif ($id > 0) {
	    $model = \backend\modules\addr\models\AddrProvince::find($id);
	    $out['results'] = ['id' => $id, 'code' => $model->code, 'text' => $model->name];
	}
	return $out;
    }

    public function actionGetAmphur(){
	$out = [];
	if (isset($_POST['depdrop_parents'])) {
	    $parents = $_POST['depdrop_parents'];
	    if ($parents != null) {
		$id = empty($parents[0]) ? null : $parents[0];
		if ($id != null) {
		    $param1 = null;
		    if (!empty($_POST['depdrop_params'])) {
			$params = $_POST['depdrop_params'];
			$param1 = $params[0]; // get the value of input-type-1
		    }
		    //$pid = Yii::$app->db->createCommand("SELECT PROVINCE_ID FROM addr_province WHERE PROVINCE_CODE = :id", [':id'=>$id])->queryScalar();
		    
		    $sql = "SELECT id, `name` FROM `addr_district` WHERE `provinceId` = :id";
		    $data = Yii::$app->db->createCommand($sql, [':id'=>$id])->queryAll();
		    
		    $out = array_values($data);
		    echo Json::encode(['output'=>empty($out)?'':$out, 'selected'=>$param1]);
		   
		    return;
		}
	    }
	}
	echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    
    public function actionGetTumbon(){
	$out = [];
	if (isset($_POST['depdrop_parents'])) {
	    $parents = $_POST['depdrop_parents'];
	    $ids = $_POST['depdrop_parents'];
	    $pid = empty($ids[0]) ? null : $ids[0];
	    $aid = empty($ids[1]) ? null : $ids[1];
	    if ($aid != null) {
		$param1 = null;
		if (!empty($_POST['depdrop_params'])) {
		    $params = $_POST['depdrop_params'];
		    $param1 = $params[0]; // get the value of input-type-1
		}
		
		//$id = Yii::$app->db->createCommand("SELECT AMPHUR_ID FROM const_amphur WHERE AMPHUR_CODE = :id", [':id'=>$aid])->queryScalar();
		
		$sql = "SELECT id, `name` FROM `addr_subdistrict` WHERE `districtId` = :aid";
		$data = Yii::$app->db->createCommand($sql, [':aid'=>$aid])->queryAll();
		
		$out = array_values($data);
		echo Json::encode(['output'=> empty($out)?'':$out, 'selected'=>$param1]);
		return;
	    }
	}
	echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    
}
