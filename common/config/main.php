<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => 'PTSP DKI',
    'aliases' => [
        '@asset' => '/assets'
    ],
//    'language' => 'id',
    'modules' => [
        'user' => [
//            'identityClass' => 'dektrium\user\models\User',
            'class' => 'dektrium\user\Module',
            'modelMap' => [
                'User' => 'backend\models\User',
            ],
            'controllerMap' => [
                'security' => [
                    'class' => 'dektrium\user\controllers\SecurityController',
//                    'layout' => '@app/views/layouts/lay-blank',
                ],
                'registration' => [
                    'class' => 'dektrium\user\controllers\RegistrationController',
//                    'layout' => '@app/views/layouts/lay-blank',
                ],
            ],
//            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
//        'admin' => [
//            'class' => 'app\modules\admin\Module',
//            // ... other configurations for the module ...
//        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            // format settings for displaying each date attribute
            'displaySettings' => [
                'date' => 'dd-MM-yyyy',
                'time' => 'HH:mm:ss a',
                'datetime' => 'dd-MM-yyyy HH:mm:ss a',
            ],
            // format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                'date' => 'php:Y-m-d', // saves as unix timestamp
                'time' => 'php:H:i:s',
                'datetime' => 'php:Y-m-d H:i:s',
            ],
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
        ],
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
        // other module settings
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        // other module settings
        ],
        'rbac' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'dektrium\user\models\User',
                    'idField' => 'id', // id field of model User
                ]
            ],
            'mainLayout' => '@app/views/layouts/main.php',
            'layout' => null, // default null. other avaliable value 'right-menu' and 'top-menu'
            'menus' => [
                'assignment' => [
                    'label' => 'Assignment' // change label
                ],
            ],
        ],
    		'filemanager' => [
    				'class' => 'pendalf89\filemanager\Module',
    				// Upload routes
    				'routes' => [
    						// Base absolute path to web directory
    						'baseUrl' => '',
    						// Base web directory url
    						'basePath' => '@frontend/web',
    						// Path for uploaded files in web directory
    						'uploadPath' => 'uploads',
    				],
    				// Thumbnails info
    				'thumbs' => [
    						'small' => [
    								'name' => 'small',
    								'size' => [100, 100],
    						],
    						'medium' => [
    								'name' => 'medium',
    								'size' => [300, 200],
    						],
    						'large' => [
    								'name' => 'large',
    								'size' => [500, 400],
    						],
    				],
    		],
    ],
    'components' => [

        'i18n' => [
            'translations' => [
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                'app*' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@common/messages",
                ),
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'siteApi' => [
            'class' => 'mongosoft\soapclient\Client',
            //'url' => 'http://10.15.3.116:11000/ws/com.gov.dki.in.ws:PendudukMgmt?WSDL',
            'url' => 'http://www.webservicex.com/globalweather.asmx?WSDL',
            'options' => [
                'cache_wsdl' => WSDL_CACHE_NONE,
            ],
        ],
//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'enableStrictParsing' => true,
//            'showScriptName' => false,
//            'suffix' => '/',
//            'rules' => [
//                'debug/<controller>/<action>' => 'debug/<controller>/<action>',
//            ],
//        ],
        'assetManager' => [
            'linkAssets' => true
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.y',
            'datetimeFormat' => 'HH:mm:ss dd.MM.y'
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
    ],
];
