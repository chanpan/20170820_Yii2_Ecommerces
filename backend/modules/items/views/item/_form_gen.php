<?php
use yii\helpers\Html;

if(isset($model_ident)){
    if(isset($model_ident['identification1_name']) && $model_ident['identification1_name']!=''){
        echo '<div class="form-group">';
        echo yii\bootstrap\Html::label($model_ident['identification1_name']);
        echo Html::activeTextInput($model, 'identification1', ['maxlength' => true, 'class'=>'form-control']);
        echo '</div>';
    } else {
        Html::activeHiddenInput($model, 'identification1');
    }
    if(isset($model_ident['identification2_name']) && $model_ident['identification2_name']!=''){
        echo '<div class="form-group">';
        echo yii\bootstrap\Html::label($model_ident['identification2_name']);
        echo Html::activeTextInput($model, 'identification2', ['maxlength' => true, 'class'=>'form-control']);
        echo '</div>';
    } else {
        Html::activeHiddenInput($model, 'identification2');
    }
    if(isset($model_ident['identification3_name']) && $model_ident['identification3_name']!=''){
        echo '<div class="form-group">';
        echo yii\bootstrap\Html::label($model_ident['identification3_name']);
        echo Html::activeTextInput($model, 'identification3', ['maxlength' => true, 'class'=>'form-control']);
        echo '</div>';
    } else {
        Html::activeHiddenInput($model, 'identification3');
    }
    if(isset($model_ident['identification4_name']) && $model_ident['identification4_name']!=''){
        echo '<div class="form-group">';
        echo yii\bootstrap\Html::label($model_ident['identification4_name']);
        echo Html::activeTextInput($model, 'identification4', ['maxlength' => true, 'class'=>'form-control']);
        echo '</div>';
    } else {
        Html::activeHiddenInput($model, 'identification4');
    }
    if(isset($model_ident['identification5_name']) && $model_ident['identification5_name']!=''){
        echo '<div class="form-group">';
        echo yii\bootstrap\Html::label($model_ident['identification5_name']);
        echo Html::activeTextInput($model, 'identification5', ['maxlength' => true, 'class'=>'form-control']);
        echo '</div>';
    } else {
        Html::activeHiddenInput($model, 'identification5');
    }
}
?>
