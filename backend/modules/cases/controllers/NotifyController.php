<?php

namespace backend\modules\cases\controllers;

use Yii;
use backend\modules\cases\models\Notify;
use backend\modules\cases\models\NotifySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use appxq\sdii\helpers\SDHtml;

/**
 * NotifyController implements the CRUD actions for Notify model.
 */
class NotifyController extends Controller
{
public function actions(){
    return [
           'attachments-upload'=>[
               'class'=>'trntv\filekit\actions\UploadAction',
               'deleteRoute' => 'attachments-delete', 
               'multiple' => true,
               'fileStorage' => 'fileStorage', 
           ],
		   'attachments-delete'=>[
			   'class'=>'trntv\filekit\actions\DeleteAction',
			   'fileStorage' => 'fileStorage', 
       	   ],
			'download'=>[
				'class'=>'trntv\filekit\actions\ViewAction',
			]
       ];
}	
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
     * Lists all Notify models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NotifySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notify model.
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

   public function actionCreateCase($id){
	   Yii::$app->response->format = Response::FORMAT_JSON;
	   $notify = $this->findModel($id);
		$model = new \backend\modules\cases\models\Cases([
			'id' => \appxq\sdii\utils\SDUtility::getMillisecTime(),
			'active' => 1,
			'notify_id'=>$id,
			'name'=> $notify->name,
			'occurred_at' => $notify->notify_date
		]);
		if($model->save()){
			return  [
				'status' => 'success',
				'action' => 'create',
				'message' => SDHtml::getMsgSuccess() . Yii::t('app', 'Data completed.'),
				'data' => $model,
		    ];
		} else {
			return  [
				'status' => 'error',
				'action' => 'create',
				'message' => SDHtml::getMsgError() . Yii::t('app', 'Can not create the data.'),
				'data' => $model->getErrors(),
		    ];
		}
   }

    /**
     * Creates a new Notify model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
	if (Yii::$app->getRequest()->isAjax) {
	    $model = new Notify([
			'id'=> \appxq\sdii\utils\SDUtility::getMillisecTime(),
        	'status' => 1,
			'sdate' => date('Y-m-d'),
			'notify_date' => date('Y-m-d H:i:s')
		]);


		$model->content  = \yii\helpers\Json::encode([]);

	    if ($model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			 
	        $content = ['content'=>$model->content];
			$model->content = \yii\helpers\Json::encode($content );

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
     * Updates an existing Notify model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
	if (Yii::$app->getRequest()->isAjax) {
	    $model = $this->findModel($id);

	    if ($model->load(Yii::$app->request->post())) {
		Yii::$app->response->format = Response::FORMAT_JSON;

		$content = ['content'=>$model->content];
		$model->content = \yii\helpers\Json::encode($content );
                 
		if ($model->save()) {
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
                //\appxq\sdii\utils\VarDumper::dump($model); 
		return $this->renderAjax('update', [
		    'model' => $model,
		]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    /**
     * Deletes an existing Notify model.
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
     * Finds the Notify model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notify the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notify::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
