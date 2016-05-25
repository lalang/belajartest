<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'maintenanceMode'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site',
//    'language'=>'id',
    'components' => [
        'maintenanceMode'=>[
			'class' => '\brussens\maintenance\MaintenanceMode',
			'enabled'=>false,

		],
        
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//        ],
//            'assetManager' => [
//                'bundles' => [
//                    'dosamigos\google\maps\MapAsset' => [
//                    'options' => [
//                    //'key' => 'AIzaSyCSyao0NYCmvuvH5z5RH1dR6gQwhxnV2ak',
//                    'language' => 'id',
//                    'version' => '3.1.18'
//                    ]
//                ]
//            ],
        'request' => [
//            'class' => 'common\components\Request',
//            'web' => '/frontend/web'
            'enableCsrfValidation' => false,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            //['class' => 'common\components\UrlRule', 'connectionID' => 'db'],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
//        'view' => [
//            'theme' => [
//                'pathMap' => [
//                    '@app/views' => '
//                    @webroot/themes/material-default'
//                ],
//                'baseUrl' => '@web/themes/material-default'
//            ],
//        ],
    ],
//    'modules' => [
//      'user' => [
//      'as frontend' => 'dektrium\user\filters\FrontendFilter',
//      ], 
//    ],
   
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'rbac/*', // add or remove allowed actions to this list
            'site/*',
            'user/*',
            'site/error',
            'debug/*',
            'service/*'
        ]
    ],
    'params' => $params,
];
