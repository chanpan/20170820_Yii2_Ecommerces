<?php

namespace backend\modules\cases\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class DrawingController extends Controller {

    public function actionSaveImage() {
        if (Yii::$app->getRequest()->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            // input is in format: data:image/png;base64,...
            //chmod(Yii::$app->basePath . '/../backend/web/drawing/', 0777);

            $im = imagecreatefrompng($_POST['image']);
            imagesavealpha($im, true);
            // Fill the image with transparent color
            $color = imagecolorallocatealpha($im, 0x00, 0x00, 0x00, 127);
            imagefill($im, 0, 0, $color);
            
            //date("YmdHis")
            
            $nowFileName = $_POST['name'] . '.png';
            $fullPath = Yii::getAlias('@backend/web/drawing/data/') . $nowFileName;  
            
            $success = imagepng($im, $fullPath);
            if ($success) {
                //chmod(Yii::$app->basePath . '/../backend/web/drawing/'. $nowFileName, 0777);
                $result = [
                    'status' => 'success',
                    'action' => 'upload',
                    'message' => '<strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> ' . Yii::t('app', 'อัพโหลดรูปภาพเสร็จแล้ว'),
                    'data' => $nowFileName,
                ];
                return $result;
            } else {
                $result = [
                    'status' => 'error',
                    'action' => 'upload',
                    'message' => '<strong><i class="glyphicon glyphicon-warning-sign"></i> Error!</strong> ' . Yii::t('app', 'ไม่สามารถอัพโหลดรูปภาพ'),
                ];
                return $result;
            }
            imagedestroy($im);
        } else {
            throw new NotFoundHttpException('Ajax only.');
        }
    }

    public function actionBgImage() {
        if (Yii::$app->getRequest()->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            //chmod(Yii::$app->basePath . '/../storage/web/drawing/', 0777);
            $uploadFile = \yii\web\UploadedFile::getInstanceByName('outline-bg');

            if (isset($_GET['oldfile'])) {
                unlink(Yii::getAlias('@backend/web/drawing/bg/') . $_GET['oldfile']);
            }

            if ($uploadFile !== null) {
                $idName = \appxq\sdii\utils\SDUtility::getMillisecTime();
                
                //date("YmdHis")
                $nowFileName = $idName . '_bg_' . $_GET['name'] . date('_His') . '.png';
                $fullPath = Yii::getAlias('@backend/web/drawing/bg/') . $nowFileName;

                $uploadFile->saveAs($fullPath);
                //chmod(Yii::$app->basePath . '/../storage/web/drawing/'. $nowFileName, 0777);

                list($width, $height, $type, $attr) = getimagesize($fullPath);

                return ['files' => [
                        'name' => $nowFileName,
                        'type' => $uploadFile->type,
                        'size' => $uploadFile->size,
                        'url' => \Yii::getAlias('@web') . '/drawing/bg/' . $nowFileName,
                        'width' => $width,
                        'height' => $height,
                        'newurl' => \yii\helpers\Url::to(['//cases/drawing/bg-image', 'name' => $_GET['name'], 'oldfile' => $nowFileName]),
                ]];
            }
        } else {
            throw new NotFoundHttpException('Ajax only.');
        }
    }

}

?>
