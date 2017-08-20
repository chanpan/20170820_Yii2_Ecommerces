<?php

namespace backend\modules\cases\controllers;

use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $data = \yii\helpers\Json::encode([]);
        $id_of_notify = \appxq\sdii\utils\SDUtility::getMillisecTime();
        
        if(isset($_POST['Notify'])){
            $notify = $_POST['Notify'];
            
            $data = \yii\helpers\Json::encode($notify);
            
            $id = isset($_POST['id'])?$_POST['id']:$id_of_notify;
            
            return $this->render('index', [
                'data'=>$data,
                'notify'=>$notify,
                'id_of_notify' => $id,
            ]);
        }
        
        return $this->render('index', [
            '$data'=>$data,
        ]);
    }
    
    public function actionGetForm($type, $data, $id_of_notify)
    {
         //
	//if (Yii::$app->getRequest()->isAjax) {
            //\appxq\sdii\utils\VarDumper::dump(base64_decode($data));
            if($data!=''){
                $id = base64_decode($data);
                $con = \backend\modules\cases\models\Notify::findOne($id);
                
                
                $data = \yii\helpers\Json::encode(base64_decode($data));
                $data = \yii\helpers\Json::decode($con->content);
                //$data = $con->content;
                  //\appxq\sdii\utils\VarDumper::dump($data);

           // }
            
	    return $this->renderAjax("/default/_form_$type", [
                'type' => $type,
		  'data' => $data,
                'id_of_notify' => $id_of_notify,
	    ]);
	} 
    }
    
}
