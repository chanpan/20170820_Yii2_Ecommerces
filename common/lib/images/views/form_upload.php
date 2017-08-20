<?php
/** @var \dosamigos\fileupload\FileUploadUI $this */
use yii\helpers\Html;

$context = $this->context;
?>
    <!-- The file upload form used as target for the file upload widget -->
<?= Html::beginTag('div', $context->options); ?>
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <div class="row fileupload-buttonbar">
        <div class="col-lg-7">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="btn btn-success fileinput-button" id="btnUploads">
                <i class="glyphicon glyphicon-plus"></i>
                <span>เพิ่มรูปภาพ</span>

                <?= $context->model instanceof \yii\base\Model && $context->attribute !== null
                    ? Html::activeFileInput($context->model, $context->attribute, $context->fieldOptions)
                    : Html::fileInput($context->name, $context->value, $context->fieldOptions);?>

            </span>
            <?php $this->registerJS("
                $('#btnUploads').on('click',function(){
                    setTimeout(function(){
                        //$('#showOption').fadeIn('slow');
                    },1000);
                });
                $('span.preview img').addClass('img img-responsive');
            ")?>
            <span id="showOption"> 
                <a class="btn btn-primary start" title="<?= Yii::t('fileupload', 'Start upload') ?>">
                    <i class="glyphicon glyphicon-upload"></i>
                     
                </a>
                <a class="btn btn-warning cancel" title="<?= Yii::t('fileupload', 'Cancel upload') ?>">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    
                </a>
                <a class="btn btn-danger delete" title="<?= Yii::t('fileupload', 'Delete') ?>">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </span>    
             <!--<input type="checkbox" class="toggle"> 
             The global file processing state -->
            <span class="fileupload-process"></span>
        </div>
        <!-- The global progress state -->
        <div class="col-lg-5 fileupload-progress fade">
            <!-- The global progress bar -->
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
            </div>
            <!-- The extended global progress state -->
            <div class="progress-extended">&nbsp;</div>
        </div>
    </div>
    <!-- The table listing the files available for upload/download -->
    
    <div class="col-md-12">
        <div class="table-responsive">
        <table role="presentation" class="table table-striped table-responsive">
            <tbody class="files"></tbody>
        </table>
    </div>
    </div>
    <?php $this->registerCSS("
            span.preview img {
                width: 165px;
            }

") ?>
<?= Html::endTag('div');?>
