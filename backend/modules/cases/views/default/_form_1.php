<?php
use yii\helpers\Url;
use backend\modules\core\classes\CoreFunc;
use appxq\sdii\widgets\EzformWidget;

use yii\helpers\Html;
 
use yii\bootstrap\ActiveForm;
use appxq\sdii\helpers\SDNoty;
use appxq\sdii\helpers\SDHtml;
use yii\bootstrap\Tabs;
 //\appxq\sdii\utils\VarDumper::dump($data);

?>

<div class="modal-header" style="margin-bottom: 15px;">
    <h4 class="modal-title" >คดีเกี่ยวกับทรัพย์</h4>
</div>
<div class="modal-body">
    <?=
    Tabs::widget([
        'id' => 'tabsNotifyForm01',
        'items' => [
            [
                'label' => 'แบบตรวจสอบการปฏิบัติงาน(Check list)',
                'content' => $this->render("subform/subform_1/_sub1.php", [
                            'type' => $type,
                            'data' => $data,
                            'id_of_notify' => $id_of_notify,
                        ]),
                'active' => true
                 
            ],
            [
                'label' => 'แผนผังสังเขป',
                'content' => $this->render("subform/subform_1/_sub2.php", [
                            'type' => $type,
                            'data' => $data,
                            'id_of_notify' => $id_of_notify,
                        ]),
                'options' => ['id' => 'tab2'],
            ],
            [
                'label' => 'ร่างรายงานการตรวจสอบสถานที่เกดเหตุคดีเกี่ยวกับทรัพย์',
                'content' => $this->render("subform/subform_1/_sub3.php", [
                            'type' => $type,
                            'data' => $data,
                            'id_of_notify' => $id_of_notify,
                        ]),
                'options' => ['id' => 'tab-attachment'],
            ],
        ],
    ]);
?>
</div>

 