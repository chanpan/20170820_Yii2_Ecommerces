<?php
namespace common\lib\images;
use dosamigos\gallery\GalleryAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use dosamigos\fileupload\BaseUpload;
use Yii;
class OverFileUploadUI extends \dosamigos\fileupload\FileUploadUI{
    /**
     * @var bool whether to use the Bootstrap Gallery on the images or not
     */
    public $gallery = true;
    /**
     * @var bool load previously uploaded images or not
     */
    public $load = false;
    /**
     * @var array the HTML attributes for the file input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $fieldOptions = [];
    /**
     * @var string the ID of the upload template, given as parameter to the tmpl() method to set the uploadTemplate option.
     */
    public $uploadTemplateId;
    /**
     * @var string the ID of the download template, given as parameter to the tmpl() method to set the downloadTemplate option.
     */
    public $downloadTemplateId;
    /**
     * @var string the form view path to render the JQuery File Upload UI
     */
     
    public $formView = 'form_upload';
    /**
     * @var string the upload view path to render the js upload template
     */
    public $uploadTemplateView = 'upload';
    /**
     * @var string the download view path to render the js download template
     */
    public $downloadTemplateView = 'download';
    /**
     * @var string the gallery
     */
    public $galleryTemplateView = 'gallery';
    

    
    
    
}
