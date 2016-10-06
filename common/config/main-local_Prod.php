<?php

return [
    'components' => [

        'db' => [
            'class' => 'yii\db\Connection',
            
            // common configuration for masters
            'masterConfig' => [
                'username' => 'admin',
                'password' => 'jakart3kit3',
                'attributes' => [
                    // use a smaller connection timeout
                    PDO::ATTR_TIMEOUT => 10,
                ],
            ],
            // list of master configurations
            'masters' => [
                ['dsn' => 'mysql:host=10.15.3.231;dbname=ptspdki_v2'],
                ['dsn' => 'mysql:host=10.15.3.232;dbname=ptspdki_v2'],
            ],
            // common configuration for slaves
            'slaveConfig' => [
                'username' => 'admin',
                'password' => 'jakart3kit3',
                'attributes' => [
                    // use a smaller connection timeout
                    PDO::ATTR_TIMEOUT => 10,
                ],
            ],
            // list of slave configurations
            'slaves' => [
                //['dsn' => 'mysql:host=10.15.3.231;dbname=ptspdki_v2'],
                ['dsn' => 'mysql:host=10.15.34.83;dbname=ptspdki_v2'],
                //['dsn' => 'mysql:host=10.15.34.30;dbname=ptspdki_v2'],
                //['dsn' => 'mysql:host=10.15.3.148;dbname=ptspdki_v2'],
            ],
        ],

        'dbLogin' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=10.15.3.231;dbname=ptspdki_v2',
            'username' => 'admin',
            'password' => 'jakart3kit3',
            'charset' => 'utf8',
			'enableSchemaCache' => true,

            // Duration of schema cache.
            'schemaCacheDuration' => 3600,

            // Name of the cache component used to store schema information
            'schemaCache' => 'cache',
        ],
        
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
//            'useFileTransport' => true,
            'useFileTransport' => false,
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.gmail.com',
//                'username' => 'ptsp.dki@gmail.com',
//                'password' => 'b!smill4h',
//                'port' => '587',
//                'encryption' => 'tls',
//            ],
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'email.jakarta.go.id',
                'username' => 'bptsp@jakarta.go.id',
                'password' => 'bptspkit3',
                'port' => '25',
//                'encryption' => 'tls',
            ],
        ],
//        'helper' => [
//            'class' => 'backend\components\Helper',
//            'enableCsrfValidation' => true,
//        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to
        // use your own export download action or custom translation
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
        ]
    ]
];