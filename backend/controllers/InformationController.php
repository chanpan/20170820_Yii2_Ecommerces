<?php

namespace backend\controllers;

use Yii;
use common\models\Information;
use common\models\InformationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use appxq\sdii\helpers\SDHtml;
 
 use yii\helpers\FileHelper;
/**
 * InformationController implements the CRUD actions for Information model.
 */
class InformationController extends Controller
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
     * Lists all Information models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Information model.
     * @param integer $id
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
     * Creates a new Information model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
	if (Yii::$app->getRequest()->isAjax) {
	    $model = new Information();

	    if ($model->load(Yii::$app->request->post())) {
		Yii::$app->response->format = Response::FORMAT_JSON;
		if ($model->save()) {
		    $result = [
			'status' => 'success',
			'action' => 'create',
			'message' => SDHtml::getMsgSuccess() . Yii::t('app', 'Data completed.'),
			'data' => $model,
		    ];
		    return $result;
		} else {
		    $result = [
			'status' => 'error',
			'message' => SDHtml::getMsgError() . Yii::t('app', 'Can not create the data.'),
			'data' => $model,
		    ];
		    return $result;
		}
	    } else {
		return $this->renderAjax('create', [
		    'model' => $model,
		]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    /**
     * Updates an existing Information model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id="", $status="")
    {
	if (Yii::$app->getRequest()->isAjax) {
            
            if($status=="create"){
                $create_at = \backend\modules\ecommerce\classest\ProductClass::getCreateAt();
                $create_by = \backend\modules\ecommerce\classest\ProductClass::getCreateBy();
                $data=[
                    ':name'=>$pid,
                    ':create_at'=>$create_at,
                    ':create_by'=>$create_by
                ];
                $sql="INSERT INTO e_information(name,create_at,create_by) VALUES(:name,:create_at,:create_by)";
                $create= \Yii::$app->db->createCommand($sql,$data)->execute();
                
                $model = Information::find()->orderBy(["id" => SORT_DESC])->one();
                $ids = 100000;
                if (!empty($model)) {
                    $ids = (int) $model->id;
                }
                $id=$ids; 
            }
            
	    $model = Information::findOne($id);

	    if ($model->load(Yii::$app->request->post())) {
		Yii::$app->response->format = Response::FORMAT_JSON;
                $sql="UPDATE e_information SET name=:name, detail=:detail , update_at=:update_at, update_by=:update_by";
                $params=[
                    ':name'=>$_POST["Information"]['name'],
                    ':detail'=>$_POST["Information"]['detail'],
                    'update_at'=> \backend\modules\ecommerce\classest\ProductClass::getCreateAt(),
                    'update_by'=> \backend\modules\ecommerce\classest\ProductClass::getCreateBy()
                        ];
                $save=\Yii::$app->db->createCommand($sql,$params)->execute();
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
		return $this->renderAjax('update', [
		    'model' => $model,
		]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    /**
     * Deletes an existing Information model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
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
     * Finds the Information model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Information the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Information::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /////////////////////**************  Upload Image ***********////////////////////////////////////////
    public function actionImageUpload($id="") {
        $model = Information::findOne($id);
        //return \yii\helpers\Json::encode($model);exit();
        $imageFile = \yii\web\UploadedFile::getInstance($model, 'image');
        
         
        $directory = \Yii::getAlias('@storage/web/img/');//. DIRECTORY_SEPARATOR . Yii::$app->session->id . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            
            if ($imageFile->saveAs($filePath)) {
                //Yii::getAlias('@storage/web/source/')
                 $sql="UPDATE e_information SET image=:image WHERE id=:id";
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
            \backend\modules\ecommerce\classest\ProductClass::saveDeleteImage($name);
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
    
     public function actionShowImageUpdate(){
        $image = $_GET['img'];
        if(!empty($image)){
            return $this->renderAjax("_showimage", ["image"=>$image]);
        }
        
    }
}
