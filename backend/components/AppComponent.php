<?php

namespace backend\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\VarDumper;
use yii\web\Request;

class AppComponent extends Component {

    public function init() {
        parent::init();
        Yii::$app->params['sidebar'] = [];
        self::navbarMenu();
        self::navbarRightMenu();
        //Yii::$app->params['profilefields'] = \backend\modules\core\classes\CoreQuery::getTableFields('profile');
        $params = \backend\modules\core\classes\CoreQuery::getOptionsParams();
        Yii::$app->params = \yii\helpers\ArrayHelper::merge(Yii::$app->params, $params);
    }

    public static function navbarMenu() {
//	Yii::$app->params['navbar'] = [
//	    ['label' => 'Home', 'url' => ['/site/index']],
//	    ['label' => 'About', 'url' => ['/site/about']],
//	    ['label' => 'Contact', 'url' => ['/site/contact']],
//	];
    }

    public static function navbarRightMenu() {
        if (Yii::$app->user->isGuest) {
            Yii::$app->params['navbarR'][] = ['label' => 'Sign up', 'url' => ['/user/registration/register']];
            Yii::$app->params['navbarR'][] = ['label' => 'Sign in', 'url' => ['/user/security/login']];
        } else {
            Yii::$app->params['navbarR'][] = ['label' => 'Account(' . Yii::$app->user->identity->username . ')', 'items' => [
                    ['label' => 'Profile', 'url' => ['/user/settings/profile']],
                    ['label' => 'Account', 'url' => ['/user/settings/account']],
                    ['label' => 'Networks', 'url' => ['/user/settings/networks']],
                    ['label' => 'Manage users', 'url' => ['/user/admin/index']],
                    ['label' => 'Logout', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],
            ]];
        }
    }

    public static function sidebarMenu($moduleID, $controllerID, $actionID) {
        $group = 'item';
        if (isset($_GET['group']) && in_array($_GET['group'], ['person', 'place', 'item'])) {
            $group = $_GET['group'];
        }

        Yii::$app->params['sidebar'] = [
            ['label' => 'Dashboard', 'icon' => 'glyphicon glyphicon-dashboard', 'url' => ['//site/index']],
//	    ['label' => 'รายชื่อนักศึกษา', 'icon' => 'glyphicon glyphicon-education', 'url' => ['//app/user-list/index', 'type'=>'student'], 'active' => $controllerID == 'user-list' && $_GET['type'] == 'student', 'visible'=>(Yii::$app->user->can('admin'))],
//	    ['label' => 'รายชื่ออาจารย์', 'icon' => 'glyphicon glyphicon-blackboard', 'url' => ['//app/user-list/index', 'type'=>'teacher'], 'active' => $controllerID == 'user-list' && $_GET['type'] == 'teacher', 'visible'=>(Yii::$app->user->can('admin'))],
//	    ['label' => 'รายวิชา', 'icon' => 'glyphicon glyphicon-tag', 'url' => ['//app/tb-course/index'], 'active' => $controllerID == 'tb-course', 'visible'=>(Yii::$app->user->can('admin'))],
//	    ['label' => 'สร้างแบบสอบถาม', 'icon' => 'glyphicon glyphicon-edit', 'url' => ['//app/tb-questionnaire/index'], 'active' => $controllerID == 'tb-questionnaire', 'visible'=>(Yii::$app->user->can('admin'))],
//	    ['label' => 'ส่งแบบประเมินผลให้นักศึกษา', 'icon' => 'glyphicon glyphicon-send', 'url' => ['//app/tb-send-form/index'], 'active' => $controllerID == 'tb-send-form', 'visible'=>(Yii::$app->user->can('admin'))],
//	    ['label' => 'ตอบแบบสอบถาม', 'icon' => 'glyphicon glyphicon-certificate', 'url' => ['//app/answer/index'], 'active' => $controllerID == 'answer', 'visible'=>(Yii::$app->user->can('admin') || Yii::$app->user->can('student'))],
//	    ['label' => 'รายงานการตอบแบบสอบถาม', 'icon' => 'glyphicon glyphicon-print', 'url' => ['//app/report/index'], 'active' => $controllerID == 'report', 'visible'=>(Yii::$app->user->can('admin') || Yii::$app->user->can('teacher'))],
            ['label' => 'จัดการข้อมูลสินค้า', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => '#', 'active' => (in_array($moduleID, [
                    'ecommerce',
                ])), 'items' => [
                    ['label' => 'รายการสินค้า', 'icon' => 'glyphicon glyphicon-th', 'url' => ['//ecommerce/product/index'], 'active' => $controllerID == 'product'],
                    ['label' => 'แบรนด์สินค้า', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['//ecommerce/brand/index'], 'active' => $controllerID == 'brand'],
                    ['label' => 'หมวดหมู่สินค้า', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['//ecommerce/e-group/index'], 'active' => $controllerID == 'e-group'],
                    ['label' => 'ประเภทสินค้า', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['//ecommerce/types/index'], 'active' => $controllerID == 'types'],
                    ['label' => 'โปรโมชั่น', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['//ecommerce/promotion/index'], 'active' => $controllerID == 'promotion'],
                    ['label' => 'สี', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['//ecommerce/e-color/index'], 'active' => $controllerID == 'e-color'],
                    ['label' => 'ขนาด', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['//ecommerce/e-size/index'], 'active' => $controllerID == 'e-size'],
                ]
            ],
//              ['label' => 'Case', 'icon' => 'glyphicon glyphicon-tag', 'url' => '#', 'active' => (in_array($moduleID, [
//		      'cases',
//		  ])), 'items' => [
//		  		['label' => 'รับแจ้งเหตุ', 'icon' => 'glyphicon glyphicon-comment', 'url' => ['//cases/notify/index'], 'active' => $controllerID == 'notify'],
//		  		['label' => 'Case', 'icon' => 'glyphicon glyphicon-tag', 'url' => ['//cases/cases/index'], 'active' => $controllerID == 'cases'],
//		  		['label' => 'Case Type', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['//cases/case-type/index'], 'active' => $controllerID == 'case-type'],
//		  		['label' => 'Case Item Type', 'icon' => 'glyphicon glyphicon-list-alt', 'active' => ($controllerID == 'case-items-type' && $group == 'item'), 'url' => ['//cases/case-items-type/index', 'group'=>'item']],
//		  		['label' => 'Case Place Type', 'icon' => 'glyphicon glyphicon-list-alt', 'active' => ($controllerID == 'case-items-type' && $group == 'place'), 'url' => ['//cases/case-items-type/index', 'group'=>'place']],
//		  		['label' => 'Case person Type', 'icon' => 'glyphicon glyphicon-list-alt', 'active' => ($controllerID == 'case-items-type' && $group == 'person'), 'url' => ['//cases/case-items-type/index', 'group'=>'person']],
//				
//		 ]
//	      ],
            ['label' => 'Person', 'icon' => 'glyphicon glyphicon-user', 'url' => '#', 'active' => (in_array($moduleID, [
                    'persons',
                ])), 'items' => [
                    ['label' => 'บุคคล', 'icon' => 'glyphicon glyphicon-user', 'url' => ['//persons/person/index'], 'active' => $controllerID == 'person'],
                    //['label' => 'กรุ๊ฟเลือด', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//persons/blood-type/index'], 'active' => $controllerID == 'blood-type'],
                    //['label' => 'รายชื่อประเทศ', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//persons/country/index'], 'active' => $controllerID == 'country'],
                    ['label' => 'เพศ', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//persons/gender/index'], 'active' => $controllerID == 'gender'],
                    //['label' => 'ประเภทบุคคล', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//persons/group/index'], 'active' => $controllerID == 'group'],
                    //['label' => 'สถานะสมรถ', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//persons/marriage-status/index'], 'active' => $controllerID == 'marriage-status'],
                   // ['label' => 'สัญชาติ', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//persons/nationality/index'], 'active' => $controllerID == 'nationality'],
                   // ['label' => 'ศาสนา', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//persons/religion/index'], 'active' => $controllerID == 'religion'],
                   // ['label' => 'จังหวัด', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//persons/province/index'], 'active' => $controllerID == 'province'],
                    //['label' => 'อำเภอ', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//persons/district/index'], 'active' => $controllerID == 'district'],
                    //['label' => 'ตำบล', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//persons/subdistrict/index'], 'active' => $controllerID == 'subdistrict'],
                ]
            ],
            //           ['label' => 'Item', 'icon' => 'glyphicon glyphicon-gift', 'url' => ['//items/item/index'], 'active' => $controllerID == 'item'],
            //           ['label' => 'Place', 'icon' => 'glyphicon glyphicon-map-marker', 'url' => ['//places/place/index'], 'active' => $controllerID == 'place'],
//            ['label' => 'Categories', 'icon' => 'glyphicon glyphicon-edit', 'url' => '#', 'active' => (in_array($controllerID, [
//                    'tags',
//                ])), 'items' => [
//                    ['label' => 'Item Group', 'icon' => 'glyphicon glyphicon-pushpin', 'active' => ($controllerID == 'tags' && $_GET['taxonomy'] == 'item_group'), 'url' => ['//core/tags', 'taxonomy' => 'item_group']],
//                    ['label' => 'Place Group', 'icon' => 'glyphicon glyphicon-pushpin', 'active' => ($controllerID == 'tags' && $_GET['taxonomy'] == 'place_group'), 'url' => ['//core/tags', 'taxonomy' => 'place_group']],
//                    ['label' => 'Person Group', 'icon' => 'glyphicon glyphicon-pushpin', 'active' => ($controllerID == 'tags' && $_GET['taxonomy'] == 'person_group'), 'url' => ['//core/tags', 'taxonomy' => 'person_group']],
//                    ['label' => 'Tags', 'icon' => 'glyphicon glyphicon-tags', 'active' => ($controllerID == 'tags' && $_GET['taxonomy'] == 'post_tag'), 'url' => ['//core/tags', 'taxonomy' => 'post_tag']],
//                ]
//            ],
                       ['label' => 'รายการที่อยู่', 'icon' => 'glyphicon glyphicon-screenshot', 'url' => '#', 'active' => (in_array($moduleID, [
                 'addr',
             ])), 'items' => [
                 ['label' => 'จังหวัด', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['//addr/addr-province/index'], 'active' => $controllerID == 'addr-province'],
                 ['label' => 'อำเภอ', 'icon' => 'glyphicon glyphicon-list-alt', 'active' => ($controllerID == 'addr-district'), 'url' => ['//addr/addr-district/index']],
                               ['label' => 'ตำบล', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['//addr/addr-subdistrict/index'], 'active' => $controllerID == 'addr-subdistrict'],
                               ['label' => 'ประเทศ', 'icon' => 'glyphicon glyphicon-list-alt', 'active' => ($controllerID == 'addr-country'), 'url' => ['//addr/addr-country/index']],
             ]
                ],
//	    ['label' => 'Media', 'icon' => 'glyphicon glyphicon-picture', 'url' => ['//core/media/index'], 'visible'=>(Yii::$app->user->can('admin'))],
//	    ['label' => 'Pages', 'icon' => 'glyphicon glyphicon-file', 'visible'=>(Yii::$app->user->can('admin')), 'url' => '#', 'active' => $type=='page' && (in_array($controllerID, [
//		    'posts',
//		])), 'items' => [
//		    ['label' => 'All Pages', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['//core/posts/index', 'type'=>'page']],
//		    ['label' => 'Add New', 'icon' => 'glyphicon glyphicon-plus', 'url' => ['//core/posts/create', 'type'=>'page']],
//		]
//	    ],
//	    ['label' => 'Comments', 'icon' => 'glyphicon glyphicon-comment', 'url' => '#', 'visible'=>(Yii::$app->user->can('admin'))],
            ['label' => 'ตั้งค่า', 'icon' => 'glyphicon glyphicon-wrench', 'visible' => (Yii::$app->user->can('admin')), 'url' => '#', 'active' => (in_array($controllerID, [
                    'core-fields',
                    'core-generate',
                    'core-options',
                    'core-item-alias',
                    'tables-fields',
                    'tb-faculty',
                    'tb-department',
                ]) || in_array($moduleID, [
                    'admin',
                ])), 'items' => [
                    ['label' => 'ข้อมูลองค์กร', 'icon' => 'fa fa-location-arrow', 'url' => ['//core/core-options/config']],
                    //['label' => 'คณะ', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//app/tb-faculty/index'], 'active' => $controllerID == 'tb-faculty',],
                    //['label' => 'ภาควิชา', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['//app/tb-department/index'], 'active' => $controllerID == 'tb-department',],
                    ['label' => 'Generate', 'icon' => 'fa fa-puzzle-piece', 'active' => $controllerID == 'core-generate', 'url' => ['//core/core-generate']],
                    ['label' => 'Options Config', 'icon' => 'fa fa-sliders', 'active' => ($controllerID == 'core-options' && $actionID !== 'config'), 'url' => ['//core/core-options']],
                    ['label' => 'Input Fields', 'icon' => 'fa fa-plug', 'active' => $controllerID == 'core-fields', 'url' => ['//core/core-fields']],
                    ['label' => 'Item Alias', 'icon' => 'fa fa-share-alt', 'active' => $controllerID == 'core-item-alias', 'url' => ['//core/core-item-alias']],
                    ['label' => 'Authentication', 'icon' => 'fa fa-cogs', 'active' => in_array($moduleID, ['admin']), 'url' => ['//admin']],
                    ['label' => 'Tables Fields', 'icon' => 'fa fa-magic', 'active' => $controllerID == 'tables-fields', 'url' => '#', 'items' => [
                            ['label' => 'Profile', 'icon' => 'fa fa-chevron-right', 'active' => ($controllerID == 'tables-fields' && $_GET['table'] == 'profile'), 'url' => ['//core/tables-fields', 'table' => 'profile']],
                        ]],
                ]
            ],
        ];
    }

}
