<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\widgets\ModalForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\members\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ข้อมูลสมาชิก');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="member-index">

    <div class="sdbox-header">
	<h3><?=  Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(['id'=>'member-grid-pjax']);?>
    <?= GridView::widget([
	'id' => 'member-grid',
	'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['member/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-member']). ' ' .
		      Html::button(SDHtml::getBtnDelete(), ['data-url'=>Url::to(['member/deletes']), 'class' => 'btn btn-danger btn-sm', 'id'=>'modal-delbtn-member', 'disabled'=>true]),
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
	    [
		'class' => 'yii\grid\CheckboxColumn',
		'checkboxOptions' => [
		    'class' => 'selectionMemberIds'
		],
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:40px;text-align: center;'],
	    ],
	    [
		'class' => 'yii\grid\SerialColumn',
		'headerOptions' => ['style'=>'text-align: center;'],
		'contentOptions' => ['style'=>'width:60px;text-align: center;'],
	    ],

            'id',
            'username',
            'password',
            'prefix',
            'fname',
            // 'lname',
            // 'gender',
            // 'birthday',
            // 'email:email',
            // 'address',
            // 'province',
            // 'amphur',
            // 'district',
            // 'zipcode',
            // 'ident_number',
            // 'status',

	    [
		'class' => 'appxq\sdii\widgets\ActionColumn',
		'contentOptions' => ['style'=>'width:80px;text-align: center;'],
		'template' => '{update} {delete}',
	    ],
        ],
    ]); ?>
    <?php  Pjax::end();?>

</div>

<?=  ModalForm::widget([
    'id' => 'modal-member',
    'size'=>'modal-lg',
]);
?>

<?php  $this->registerJs("
$('#member-grid-pjax').on('click', '#modal-addbtn-member', function() {
    modalMember($(this).attr('data-url'));
});

$('#member-grid-pjax').on('click', '#modal-delbtn-member', function() {
    selectionMemberGrid($(this).attr('data-url'));
});

$('#member-grid-pjax').on('click', '.select-on-check-all', function() {
    window.setTimeout(function() {
	var key = $('#member-grid').yiiGridView('getSelectedRows');
	disabledMemberBtn(key.length);
    },100);
});

$('#member-grid-pjax').on('click', '.selectionMemberIds', function() {
    var key = $('input:checked[class=\"'+$(this).attr('class')+'\"]');
    disabledMemberBtn(key.length);
});

$('#member-grid-pjax').on('click', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalMember('".Url::to(['member/update', 'id'=>''])."'+id);
});	

$('#member-grid-pjax').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalMember(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#member-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }).fail(function() {
		". SDNoty::show("'" . SDHtml::getMsgError() . "Server Error'", '"error"') ."
		console.log('server error');
	    });
	});
    }
    return false;
});

function disabledMemberBtn(num) {
    if(num>0) {
	$('#modal-delbtn-member').attr('disabled', false);
    } else {
	$('#modal-delbtn-member').attr('disabled', true);
    }
}

function selectionMemberGrid(url) {
    yii.confirm('".Yii::t('app', 'Are you sure you want to delete these items?')."', function() {
	$.ajax({
	    method: 'POST',
	    url: url,
	    data: $('.selectionMemberIds:checked[name=\"selection[]\"]').serialize(),
	    dataType: 'JSON',
	    success: function(result, textStatus) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		    $.pjax.reload({container:'#member-grid-pjax'});
		} else {
		    ". SDNoty::show('result.message', 'result.status') ."
		}
	    }
	});
    });
}

function modalMember(url) {
    $('#modal-member .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-member').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>