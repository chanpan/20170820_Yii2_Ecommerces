<?php

namespace backend\modules\items\controllers;

use Yii;
use backend\modules\items\models\Item;
use backend\modules\items\models\ItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use appxq\sdii\helpers\SDHtml;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
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
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
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
    public function actionGetTable()
    {
	if (Yii::$app->getRequest()->isAjax) {
            $case = isset($_GET['case'])?$_GET['case']:0;
            
            $searchModel = new ItemSearch();
            $searchModel->case_id = $case;
            $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);
            
	    return $this->renderAjax('_grid', [
		'dataProvider' => $dataProvider,
                'case'=>$case,
	    ]);
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }
    /**
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
	if (Yii::$app->getRequest()->isAjax) {
	    $model = new Item();
            $model->id = \appxq\sdii\utils\SDUtility::getMillisecTime();
            $model->active = 1;
            
	    if ($model->load(Yii::$app->request->post())) {
		Yii::$app->response->format = Response::FORMAT_JSON;
                
                $model->id = \appxq\sdii\utils\SDUtility::getMillisecTime();
            
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
                    'model_ident' => NULL,
		]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
	if (Yii::$app->getRequest()->isAjax) {
	    $model = $this->findModel($id);

            $model_ident = \backend\modules\items\models\ItemIdentName::find()->where('term_taxonomy_id=:term_id', [':term_id'=>$model->item_group_id])->one();
            
	    if ($model->load(Yii::$app->request->post())) {
		Yii::$app->response->format = Response::FORMAT_JSON;
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
                    'model_ident' => $model_ident?$model_ident:NULL,
		]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }
    
    public function actionSave()
    {
	if (Yii::$app->getRequest()->isAjax) {
            $id = isset($_GET['id'])?$_GET['id']:0;
            $case = isset($_GET['case'])?$_GET['case']:0;
            $view_load = isset($_GET['view_load'])?$_GET['view_load']:0;
            
	    $model = Item::find()->where('id=:id', [':id'=>$id])->one();
            $model_ident = \backend\modules\items\models\ItemIdentName::find()->where('term_taxonomy_id=:term_id', [':term_id'=>$model->item_group_id])->one();
            
            if(!$model){
                $model = new Item();
                $model->case_id = $case;
                $model->id = \appxq\sdii\utils\SDUtility::getMillisecTime();
                $model->active = 1;
            }
            
	    if ($model->load(Yii::$app->request->post())) {
		Yii::$app->response->format = Response::FORMAT_JSON;
                
		if ($model->save()) {
                    $action = 'update';
                    $modelCaseItems = \backend\modules\cases\classes\CaseQuery::getCaseItemsByItem('item_id', $model->id);
                    if(!$modelCaseItems){
                        $action = 'create';
                        $modelCaseItems = new \backend\modules\cases\models\CaseItems();
                        $modelCaseItems->id = \appxq\sdii\utils\SDUtility::getMillisecTime();
                    } 
                    $modelCaseItems->case_id = $model->case_id;
                    $modelCaseItems->case_items_type_id = $model->case_items_type_id;
                    $modelCaseItems->item_id = $model->id;
                    $modelCaseItems->save();
                    
                    
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
			'data' => $model,
		    ];
		    return $result;
		}
	    } else {
		return $this->renderAjax('_form_case', [
		    'model' => $model,
                    'model_ident' => $model_ident?$model_ident:NULL,
                    'view_load'=>$view_load,
		]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }
    
    public function actionGetForm()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        
	if (Yii::$app->getRequest()->isAjax) {
            $id = isset($_POST['id'])?$_POST['id']:0;
            $term = isset($_POST['term'])?$_POST['term']:0;
            
            $model = Item::find()->where('id=:id', [':id'=>$id])->one();
            $model_ident = \backend\modules\items\models\ItemIdentName::find()->where('term_taxonomy_id=:term_id', [':term_id'=>$term])->one();
            
            if(!$model){
                $model = new Item();
            } 
            
	    $html = $this->renderAjax('_form_gen', [
                'model' => $model,
                'model_ident' => $model_ident?$model_ident:NULL,
            ]);
            
            $result = [
		    'status' => 'success',
		    'message' => SDHtml::getMsgSuccess() . Yii::t('app', 'Gen completed.'),
		    'html' => $html,
		];
		return $result;
	} else {
	    $result = [
		    'status' => 'error',
		    'message' => SDHtml::getMsgError() . Yii::t('app', 'Invalid request. Please do not repeat this request again.'),
		];
		return $result;
	}
    }

    /**
     * Deletes an existing Item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
	if (Yii::$app->getRequest()->isAjax) {
	    Yii::$app->response->format = Response::FORMAT_JSON;
            $model = $this->findModel($id);
//            $item_id = $model->id;
	    if ($model->delete()) {
//                $modelCaseItems = \backend\modules\cases\classes\CaseQuery::getCaseItemsByItem('item_id', $item_id);
//                if($modelCaseItems){
//                    $modelCaseItems->delete();
//                }
                
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
                    //$item_id = $model->id;
                    if ($model->delete()) {
//                        $modelCaseItems = \backend\modules\cases\classes\CaseQuery::getCaseItemsByItem('item_id', $item_id);
//                        if($modelCaseItems){
//                            $modelCaseItems->delete();
//                        }
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
    
    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
