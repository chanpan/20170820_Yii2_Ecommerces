<?php
use yii\helpers\Html;
use yii\helpers\Url;
use appxq\sdii\widgets\GridView;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="person_grid">
    <div class="modal-header " style="margin-bottom: 10px;">
        <?=Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['/persons/person/save', 'case' => $case, 'view_load'=>1]), 'class' => 'btn btn-success btn-sm pull-right', 'id'=>'modal-addbtn-person'])?>
	<h4 class="modal-title" id="itemModalLabel">Person</h4>
    </div>
    
<?= GridView::widget([
	    'id' => 'person-grid',
        'layout' => "{items}\n{pager}",
        'tableOptions'=> ['class' => 'table  table-hover'],
        'panel'=>false,
	    'panelBtn' => Html::button(SDHtml::getBtnAdd(), ['data-url'=>Url::to(['person/create']), 'class' => 'btn btn-success btn-sm', 'id'=>'modal-addbtn-person']),
	    'dataProvider' => $dataProvider,
        'columns' => [
	    [
		    'class' => 'yii\grid\SerialColumn',
		    'headerOptions' => ['style'=>'text-align: center;'],
		    'contentOptions' => ['style'=>'width:60px;text-align: center;'],
	    ],
            [
		'attribute'=>'case_items_type_id',
                 'contentOptions'=>['style'=>'width:180px;'],     
                
            ], 
            [
		'attribute'=>'person_group_id',
                'value'=>function ($data){ 
                    $data_taxonomy = \backend\modules\core\classes\CoreQuery::getTaxonomyById($data->person_group_id);
                    if($data_taxonomy){
                        return $data_taxonomy['name'];
                    }
                    return '';
                },
		'label'=>'กลุ่ม',
                        'contentOptions'=>['style'=>'width:180px;'],     
            ],
            [
		'attribute'=>'active',
		'value'=>function ($data){ 
                    if($data['active']){
                        return 'Yes';
                    } else {
                        return 'No';
                    }
                },
		'headerOptions'=>['style'=>'text-align: center;'],
		'contentOptions'=>['style'=>'width:100px; text-align: center;'],
            ],
            [
                    'attribute'=>'updated_at',
                    'value'=>function ($data){return \appxq\sdii\utils\SDdate::mysql2phpThDateSmall($data['updated_at']);},
                    'headerOptions'=>['style'=>'text-align: center;'],
                    'contentOptions'=>['style'=>'width:100px;text-align: center;'],
                    'filter'=>'',
            ],
	    [
		'class' => 'appxq\sdii\widgets\ActionColumn',
		'contentOptions' => ['style'=>'width:80px;text-align: center;'],
		'template' => ' {update} {delete}',
                'buttons' => [
		    'update' => function ($url, $data, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/persons/person/save', 'id'=>$data->id, 'case'=>$case, 'view_load'=>1]), [
                            'data-action' => 'update',
                            'title' => Yii::t('yii', 'Update'),
                            'data-pjax' => isset($this->pjax_id)?$this->pjax_id:'0',
                        ]);
		    },
		]
	    ],
        ],
    ]); ?>
</div>

<hr>

<?php  $this->registerJs("
$('#person_grid').on('click', '#modal-addbtn-person', function() {
    modalPerson($(this).attr('data-url'));
});

$('#person_grid').on('dblclick', 'tbody tr', function() {
    var id = $(this).attr('data-key');
    modalPerson('".Url::to(['/persons/person/save', 'case'=>$case, 'view_load'=>1, 'id'=>''])."'+id);
});	

$('#person_grid').on('click', 'tbody tr td a', function() {
    var url = $(this).attr('href');
    var action = $(this).attr('data-action');

    if(action === 'update' || action === 'view') {
	modalPerson(url);
    } else if(action === 'delete') {
	yii.confirm('".Yii::t('app', 'Are you sure you want to delete this item?')."', function() {
	    $.post(
		url
	    ).done(function(result) {
		if(result.status == 'success') {
		    ". SDNoty::show('result.message', 'result.status') ."
		   personUi();
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

$('#modal-items').on('hidden.bs.modal', function(e){
    $('body').addClass('modal-open');
});

function modalPerson(url) {
    $('#modal-items .modal-content').html('<div class=\"sdloader \"><i class=\"sdloader-icon\"></i></div>');
    $('#modal-items').modal('show')
    .find('.modal-content')
    .load(url);
}

");?>