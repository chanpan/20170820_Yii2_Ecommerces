<?php
use yii\helpers\Url;
use backend\modules\core\classes\CoreFunc;
use appxq\sdii\widgets\EzformWidget;

use yii\helpers\Html;
 
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\bootstrap\Tabs;
 

?>
<div class="modal-header" style="margin-bottom: 15px;">
    <h4 class="modal-title" >คดีเกี่ยวกับชีวิต </h4>
</div>
<div class="modal-body">
    <?=
    Tabs::widget([
        'id' => 'tabsNotifyForm002',
        'items' => [
            [
                'label' => 'แบบตรวจสอบการปฏิบัติงาน',
                'content' => $this->render("subform/subform_2/_sub1.php", [
                            'type' => $type,
                            'data' => $data,
                            'id_of_notify' => $id_of_notify,
                        ]),
                'active' => true
                 
            ],
            [
                'label' => 'แผนผังสังเขป',
                'content' => $this->render("subform/subform_2/_sub2.php", [
                            'type' => $type,
                            'data' => $data,
                            'id_of_notify' => $id_of_notify,
                        ]),
                'options' => ['id' => 'tab12'],
            ],
            [
                'label' => 'แผนภาพแสดงตำแหน่งบาดแผล',
                'content' => $this->render("subform/subform_2/_sub3.php", [
                            'type' => $type,
                            'data' => $data,
                            'id_of_notify' => $id_of_notify,
                        ]),
                'options' => ['id' => 'tab13'],
            ],
            [
                'label' => 'ร่างรายงานคดีเกี่ยวกับชีวิต (ในอาคาร)',
                'content' => $this->render("subform/subform_2/_sub4.php", [
                            'type' => $type,
                            'data' => $data,
                            'id_of_notify' => $id_of_notify,
                        ]),
                'options' => ['id' => 'tab14'],
            ],[
                'label' => 'ร่างรายงานคดีเกี่ยวกับชีวิต (นอกอาคาร)',
                'content' => $this->render("subform/subform_2/_sub5.php", [
                            'type' => $type,
                            'data' => $data,
                            'id_of_notify' => $id_of_notify,
                        ]),
                'options' => ['id' => 'tab15'],
            ],
 
        ],
    ]);
?>
</div>