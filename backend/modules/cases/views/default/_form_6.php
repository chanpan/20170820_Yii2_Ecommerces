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
    <h4 class="modal-title" >ตรวจเก็บวัตถุพยาน</h4>
</div>
<div class="modal-body">
    <?=
    Tabs::widget([
        'id' => 'tabsNotifyForm01',
        'items' => [
            [
                'label' => 'แบบตรวจสอบการปฏิบัติงาน',
                'content' => $this->render("subform/total/subform_3/_sub1.php", [
                    'type' => $type,
                    'data' => $data,
                    'id_of_notify' => $id_of_notify,
                ]),
                'active' => true
            ],
            [
                'label' => 'แผนผังสังเขป',
                'content' => $this->render("subform/total/subform_3/_sub2.php", [
                    'type' => $type,
                    'data' => $data,
                    'id_of_notify' => $id_of_notify,
                ]),
                'options' => ['id' => 'tab200'],
            ],
            [
                'label' => 'แผนภาพแสดงตำแหน่งบาดแผล',
                'content' => $this->render("subform/total/subform_3/_sub3.php", [
                    'type' => $type,
                    'data' => $data,
                    'id_of_notify' => $id_of_notify,
                ]),
                'options' => ['id' => 'tab2003'],
            ],
            [
                'label' => 'ร่างรายงานคดีเกี่ยวกับทรัพย์',
                'content' => $this->render("subform/total/subform_3/_sub6.php", [
                    'type' => $type,
                    'data' => $data,
                    'id_of_notify' => $id_of_notify,
                ]),
                'options' => ['id' => 'tab2009'],
            ],
            [
                'label' => 'ร่างรายงานคดี(ในอาคาร)',
                'content' => $this->render("subform/total/subform_3/_sub4.php", [
                    'type' => $type,
                    'data' => $data,
                    'id_of_notify' => $id_of_notify,
                ]),
                'options' => ['id' => 'tab2004'],
            ], [
                'label' => 'ร่างรายงานคดี  (นอกอาคาร)',
                'content' => $this->render("subform/total/subform_3/_sub5.php", [
                    'type' => $type,
                    'data' => $data,
                    'id_of_notify' => $id_of_notify,
                ]),
                'options' => ['id' => 'tab2005'],
            ],
        ],
    ]);
    ?>
</div>


