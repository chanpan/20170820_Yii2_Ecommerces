<?php

namespace backend\modules\ecommerce\controllers;

use Yii;
use backend\modules\ecommerce\models\Product;
use backend\modules\ecommerce\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use appxq\sdii\helpers\SDHtml;
use backend\modules\ecommerce\classest\ProductClass;
use yii\helpers\FileHelper;
/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public function behaviors()
    {
        return [
/*	    'access' => [
		'class' => AccessControl::className(),
		'rules' => [
		    [
			'allow' => true,
			'actions' => ['index', 'view'], 
			'roles' => ['?', '@'],
		    ],
		    [
			'allow' => true,
			'actions' => ['view', 'create', 'update', 'delete', 'deletes'], 
			'roles' => ['@'],
		    ],
		],
	    ],*/
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
	if (parent::beforeAction($action)) {
	    if (in_array($action->id, array('create', 'update'))) {
		
	    }
	    return true;
	} else {
	    return false;
	}
    }
    
    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
	if (Yii::$app->getRequest()->isAjax) {
	    return $this->renderAjax('view', [
		'model' => $this->findModel($id),
	    ]);
	} else {
	    return $this->render('view', [
		'model' => $this->findModel($id),
	    ]);
	}
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//	if (Yii::$app->getRequest()->isAjax) {
//	    $model = new Product();
//
//	    if ($model->load(Yii::$app->request->post())) {
//		Yii::$app->response->format = Response::FORMAT_JSON;
//                
//		if ($model->save()) {
//		    $result = [
//			'status' => 'success',
//			'action' => 'create',
//			'message' => SDHtml::getMsgSuccess() . Yii::t('app', 'Data completed.'),
//			'data' => $model,
//		    ];
//		    return $result;
//		} else {
//		    $result = [
//			'status' => 'error',
//			'message' => SDHtml::getMsgError() . Yii::t('app', 'Can not create the data.'),
//			'data' => $model,
//		    ];
//		    return $result;
//		}
//	    } else {
//                $pid =  ProductClass::getAutoIdProduct();
//                $color_id =  ProductClass::getColorProduct();
//                $create_at = ProductClass::getCreateAt();
//                $create_by = ProductClass::getCreateBy();
//                
//                $data=[
//                    ':id'=>ProductClass::getAutoIdProduct(),
//                    ':pid'=>ProductClass::getAutoIdProduct(),
//                    ':name'=>' ',
//                    ':price'=>(int)'',
//                    ':type_id'=>(int)'000000',
//                    ':color_id'=>(int)'000000',
//                    ':size_id'=>(int)'000000',
//                    ':create_at'=>$create_at,
//                    ':create_by'=>$create_by
//                ];
//                \appxq\sdii\utils\VarDumper::dump($data);exit();
//                $create= ProductClass::InsertProduct($data);
//                $this->redirect(['update','id'=>ProductClass::getAutoIdProduct()]);
//                //$this->actionUpdate($model->id);
//		return $this->renderAjax('create', [
//		    'model' => $model,
//		]);
//	    }
//	} else {
//	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
//	}
//    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id="",$status="")
    {
	if (Yii::$app->getRequest()->isAjax) {
            if($status=="create"){
                $pid =  ProductClass::getAutoIdProduct();
                $color_id =  ProductClass::getColorProduct();
                $create_at = ProductClass::getCreateAt();
                $create_by = ProductClass::getCreateBy();
                
                $data=[
                    ':id'=>$pid,
                    ':pid'=>$pid,
                    ':name'=>' ',
                    ':price'=>(int)'',
                    ':type_id'=>(int)'000000',
                    ':color_id'=>(int)'000000',
                    ':size_id'=>(int)'000000',
                    ':create_at'=>$create_at,
                    ':create_by'=>$create_by
                ];
                $create= ProductClass::InsertProduct($data);
                
                $id=$pid;
            }
            
            
	    $model = $this->findModel($id);

	    if ($model->load(Yii::$app->request->post())) {
                $post = \Yii::$app->request->post();
		Yii::$app->response->format = Response::FORMAT_JSON;
                $model->update_at = ProductClass::getCreateAt();
                $model->update_by = ProductClass::getCreateBy();
                
                //print_r($post);exit();
                $model->size_id = implode(",", $post['Product']['size_id']);
                $model->color_id = implode(",", $post['Product']['color_id']);
              
                $sql="UPDATE e_product 
                    SET 
                     pid=:pid,
                    bid=:bid,
                    name=:name,
                    detail=:detail,
                    price=:price,
                    price2=:price2,
                    qty=:qty,
                    type_id=:type_id,
                    pro_id=:pro_id,
                    brand_id=:brand_id,
                    update_at=:update_at,
                    update_by=:update_by,
                    size_id=:size_id,
                    color_id=:color_id 
                     WHERE id=:id
                    
                ";
                $params=[
                    ":pid"=>$post['Product']['pid'],
                    ":bid"=>$post['Product']['bid'],
                    ":name"=>$post['Product']['name'],
                    ":detail"=>$post['Product']['detail'],
                    ":price"=>(int)$post['Product']['price'],
                    ":price2"=>(int)$post['Product']['price2'],
                    ":qty"=>(int)$post['Product']['qty'],
                    ":type_id"=>(int)$post['Product']['type_id'],
                    ":pro_id"=>(int)$post['Product']['pro_id'],
                    ":brand_id"=>(int)$post['Product']['brand_id'],
                    ":update_at"=>ProductClass::getCreateAt(),
                    ":update_by"=>ProductClass::getCreateBy(),
                    ":size_id"=>$model->size_id,
                    ':color_id'=>$model->color_id,
                    ":id"=>$id
                ];
                $save = Yii::$app->db->createCommand($sql,$params)->execute();

                 
		if ($save) {
		    $result = [
			'status' => 'success',
			'action' => 'update',
			'message' => SDHtml::getMsgSuccess() . Yii::t('app', 'Data completed.'),
			'data' => $model,
		    ];
		    return $result;
		} else {
                    
		    $result = [
			'status' => 'error',
			'message' => SDHtml::getMsgError() . Yii::t('app', 'Can not update the data.'),
			'data' => $model,
		    ];
		    return $result;
		}
	    } else {
                $model->color_id = explode(",", $model->color_id);
                $model->size_id = explode(",", $model->size_id);
		return $this->renderAjax('update', [
		    'model' => $model,
		]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
	if (Yii::$app->getRequest()->isAjax) {
	    Yii::$app->response->format = Response::FORMAT_JSON;
	    if ($this->findModel($id)->delete()) {
		$result = [
		    'status' => 'success',
		    'action' => 'update',
		    'message' => SDHtml::getMsgSuccess() . Yii::t('app', 'Deleted completed.'),
		    'data' => $id,
		];
		return $result;
	    } else {
		$result = [
		    'status' => 'error',
		    'message' => SDHtml::getMsgError() . Yii::t('app', 'Can not delete the data.'),
		    'data' => $id,
		];
		return $result;
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    public function actionDeletes() {
	if (Yii::$app->getRequest()->isAjax) {
	    Yii::$app->response->format = Response::FORMAT_JSON;
	    if (isset($_POST['selection'])) {
		foreach ($_POST['selection'] as $id) {
		    $this->findModel($id)->delete();
		}
		$result = [
		    'status' => 'success',
		    'action' => 'deletes',
		    'message' => SDHtml::getMsgSuccess() . Yii::t('app', 'Deleted completed.'),
		    'data' => $_POST['selection'],
		];
		return $result;
	    } else {
		$result = [
		    'status' => 'error',
		    'message' => SDHtml::getMsgError() . Yii::t('app', 'Can not delete the data.'),
		    'data' => $id,
		];
		return $result;
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }
    
    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
    
    /////////////////////**************  Upload Image ***********////////////////////////////////////////
    public function actionImageUpload($id="") {
        $model = Product::findOne($id);
        //return \yii\helpers\Json::encode($model);exit();
        $imageFile = \yii\web\UploadedFile::getInstance($model, 'image');
        
         
        $directory = Yii::getAlias('@storage/web/img/');//. DIRECTORY_SEPARATOR . Yii::$app->session->id . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            
            if ($imageFile->saveAs($filePath)) {
                //Yii::getAlias('@storage/web/source/')
                 $sql="UPDATE e_product SET image=:image WHERE id=:id";
                if(!empty($model->image)){
                   $image = $model->image .= ",".$fileName;
                   $params=[':image'=>$image,':id'=>$id];
                }else{
                   $params=[':image'=>$fileName,':id'=>$id]; 
                }
                
                \Yii::$app->db->createCommand($sql,$params)->execute();
                
                $path = Yii::getAlias('@storageUrl').'/web/img/'.$fileName;// . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
                return \yii\helpers\Json::encode([
                            'files' => [
                                [
                                    'name' => $fileName,
                                    'size' => $imageFile->size,
                                    'url' => $path,
                                    'thumbnailUrl' => $path,
                                    'deleteUrl' => 'image-delete?name=' . $fileName,
                                    'deleteType' => 'POST',
                                ],
                            ],
                ]);
            }
        }

        return '';
    }
    public function actionTest(){
          
    }
    public function actionImageDelete() {
        $this->enableCsrfValidation = false;
        if (!empty($_GET)) {
            $name = $_GET['name'];
            ProductClass::saveDeleteImage($name);
            $directory = Yii::getAlias('@storage/web/img');// . DIRECTORY_SEPARATOR . Yii::$app->session->id;
            if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
                unlink($directory . DIRECTORY_SEPARATOR . $name);
            }

            $files = \yii\helpers\FileHelper::findFiles($directory);
            $output = [];


            
            foreach ($files as $file) {
                $fileName = basename($file);
                $path = Yii::getAlias('@storageUrl') . '/web/img/'.$fileName;// . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
                $output['files'][] = [
                    'name' => $fileName,
                    'size' => filesize($file),
                    'url' => $path,
                    'thumbnailUrl' => $path,
                    'deleteUrl' => 'image-delete?name=' . $fileName,
                    'deleteType' => 'POST',
                ];
            }
            return \yii\helpers\Json::encode($output);
        }
    }
    
    //แสดง size ใน gridview
    public function actionSizeValue($size, $id=""){
        $size = explode(",", $size);
        $out = [];
        for($i=0; $i<count($size); $i++){
           // $out .= $size[$i];
             $model = \backend\modules\ecommerce\models\ESizes::find()->where(["id"=>$size[$i]])->one();
            array_push($out, $model->name);
             
        }
        if(count($out) > 1){
            $output = implode(",", $out);
        }else{
            $output = $out[0];
        }
        return $output;
    }
     //แสดง color ใน gridview
    public function actionColorValue($color, $id=""){
        $color = explode(",", $color);
        $out = [];
        for($i=0; $i<count($color); $i++){
           // $out .= $size[$i];
             $model = \backend\modules\ecommerce\models\EColors::find()->where(["id"=>$color[$i]])->one();
            array_push($out, $model->name);
             
        }
        if(count($out) > 1){
            $output = implode(",", $out);
        }else{
            $output = $out[0];
        }
        return $output;
    }
    //แสดง image ตอน update 
    public function actionShowImageUpdate(){
        $image = $_GET['img'];
        if(!empty($image)){
            return $this->renderAjax("_showimage", ["image"=>$image]);
        }
        
    }

}
