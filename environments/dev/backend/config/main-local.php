<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs'=>['*'],
        'generators' => [ 
            'crud' => [ 
                'class' => 'yii\gii\generators\crud\Generator', 
                'templates' => [
                    'crud' => '@common/templates/sdii-crud',
                    'crud-ajax' => '@common/templates/sdii-crud-ajax', 
                ]
            ],
            'model' => [ 
                'class' => 'yii\gii\generators\model\Generator', 
                'templates' => [
                    'sdii' => '@common/templates/sdii-model', 
                ]
            ]
        ],
    ];
}

return $config;
