<?php
namespace backend\modules\guides\controllers;

use Yii;
use yii\web\Controller;

/**
 * Select2Controller implements the CRUD actions for EzformInput model.
 */
class UploadController extends Controller
{
    
    public function actions()
    {
        return [
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => Yii::getAlias('@web') . '/form-upload', // Directory URL address, where files are stored.
                'path' => '@app/web/form-upload', // Or absolute path to directory where files are stored.
                    'validatorOptions' => [
                      'maxWidth' => 3000,
                      'maxHeight' => 3000
                  ],
            ],
            'file-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => Yii::getAlias('@web') . '/form-upload', // Directory URL address, where files are stored.
                'path' => '@app/web/form-upload', // Or absolute path to directory where files are stored.
                'uploadOnlyImage' => false,
                'validatorOptions' => [
                    'maxSize' => 50000000
                ]
            ],
            'files-get' => [
                'class' => 'appxq\sdii\action\GetAction',
                'url' => Yii::getAlias('@web') . '/form-upload', // Directory URL address, where files are stored.
                'path' => '@app/web/form-upload', // Or absolute path to directory where files are stored.
                'type' => \appxq\sdii\action\GetAction::TYPE_FILES,
            ],
            'images-get' => [
                'class' => 'appxq\sdii\action\GetAction',
                'url' => Yii::getAlias('@web') . '/form-upload', // Directory URL address, where files are stored.
                'path' => '@app/web/form-upload', // Or absolute path to directory where files are stored.
                'type' => \appxq\sdii\action\GetAction::TYPE_IMAGES,
            ]
        ];
    }

}
