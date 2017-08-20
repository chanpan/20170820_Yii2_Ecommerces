<?php

namespace backend\modules\cases\controllers;

use Yii;
use backend\modules\cases\models\Notify;
use backend\modules\cases\models\Cases;
use backend\modules\cases\models\CasesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use appxq\sdii\helpers\SDHtml;

/**
 * CasesController implements the CRUD actions for Cases model.
 */
class CasesController extends Controller
{
    public function behaviors()
    {
        return [
	    // 'access' => [
		// 'class' => AccessControl::className(),
		// 'rules' => [
		//     [
		// 	'allow' => true,
		// 	'actions' => ['index', 'view'], 
		// 	'roles' => ['?', '@'],
		//     ],
		//     [
		// 	'allow' => true,
		// 	'actions' => ['view', 'create', 'update', 'delete', 'deletes', 'get-case','save'], 
		// 	'roles' => ['@'],
		//     ],
		// ],
	    // ],
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
     * Lists all Cases models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CasesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cases model.
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

	public function actionSave($notify_id)
    {
	if (Yii::$app->getRequest()->isAjax) {
		$notifyModel = Notify::find()->where(['id'=>$notify_id])->one();
		$model = Cases::find()->where('notify_id=:notify_id', [ ':notify_id'=> $notify_id])->one();
		if($notifyModel==null) {
			throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
		}
		if(!$model) {
			$model = new Cases([
				'id'=> \appxq\sdii\utils\SDUtility::getMillisecTime(),
				'name'=> $notifyModel->name,
				'occurred_at' => $notifyModel->notify_date,
				'description'=> $notifyModel->desc,
				'case_type_id'=> $notifyModel->case_type_id,
				'active' => 1,
				'notify_id' => $notify_id
			]);
			$model->save();
		}
            
	    if ($model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
            $action = 'update';
			$model->name= $notifyModel->name;
			$model->occurred_at = $notifyModel->notify_date;
			$model->description= $notifyModel->desc;
			$model->case_type_id= $notifyModel->case_type_id;
                    
		if ($model->save()) {
		    $result = [
				'status' => 'success',
				'action' => $action,
				'message' => SDHtml::getMsgSuccess() . Yii::t('app', 'Data completed.'),
				'data' => $model,
		    ];
		    return $result;
		} else {
		    $result = [
				'status' => 'error',
				'message' => SDHtml::getMsgError() . Yii::t('app', 'Can not update the data.'),
				'data' => $model->getErrors(),
		    ];
		    return $result;
		}
	    } else {
			return $this->renderAjax('notify', [
				'model' => $model,
				'notifyModel'=>$notifyModel
			]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    /**
     * Creates a new Cases model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
	if (Yii::$app->getRequest()->isAjax) {
	    $model = new Cases();
            $model->id = \appxq\sdii\utils\SDUtility::getMillisecTime();
            $model->active = 1;
            
	    if ($model->load(Yii::$app->request->post())) {
		Yii::$app->response->format = Response::FORMAT_JSON;
                
            $model->id = \appxq\sdii\utils\SDUtility::getMillisecTime();
            $model->occurred_at = \appxq\sdii\utils\SDdate::phpThDate2mysql($model->occurred_at);
                
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
     * Updates an existing Cases model.
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
                
                $model->occurred_at = \appxq\sdii\utils\SDdate::phpThDate2mysql($model->occurred_at);
                
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
		return $this->renderAjax('update', [
		    'model' => $model,
		]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    /**
     * Deletes an existing Cases model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
	if (Yii::$app->getRequest()->isAjax) {
	    Yii::$app->response->format = Response::FORMAT_JSON;
	    $model = $this->findModel($id);
	    if ($model->delete()) {
                
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
		    $model = $this->findModel($id);
                    if ($model->delete()) {
                        
                    }
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
    
    public function actionGetCase($q = null, $id = null) {
	Yii::$app->response->format = Response::FORMAT_JSON;
        $caseid = isset($_GET['caseid'])?$_GET['caseid']:0;

        $out = ['results' => ''];
	if (is_null($id)) {
	    $sql = "SELECT id, `name` as text FROM `cases` WHERE id<>:caseid AND (report_of is null || report_of <>:caseid) AND `name` LIKE :q limit 50";
	    $data = Yii::$app->db->createCommand($sql, [':q'=>"%$q%", ':caseid'=>$caseid])->queryAll();
	    $out['results'] = array_values($data);
	} elseif ($id > 0) {
	    $model = Cases::find($id);
	    $out['results'] = ['id' => $id, 'text' => $model->name];
	}
	return $out;
    }
    
    /**
     * Finds the Cases model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cases the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cases::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
