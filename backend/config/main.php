<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'name' => 'PTSP DKI',
    'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module',
        ],
        'admin' => [
            'class' => 'app\module\admin\Module',
        ],
//        'user' => [
//            'as backend' => 'dektrium\user\filters\BackendFilter',
//        ],
    ],
//    'layout'=>'lay-admin',
//    'language' => 'id',
    'defaultRoute' => 'site/index',
    'components' => [
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//        ],

        'request' => [
//            'class' => 'common\components\Request',
//            'web' => '/backend/web',
//            'adminUrl' => '/admin',
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
                ['class' => 'common\components\UrlRule', 'connectionID' => 'db'],
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
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-black',
                ],
            ],
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'rbac/*', // add or remove allowed actions to this list
            'user/*',
            'site/error',
            'debug/*',
        ]
    ],
    'params' => $params,
];
