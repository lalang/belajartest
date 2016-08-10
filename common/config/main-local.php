<?php

return [
    'components' => [

        'db' => [
            'class' => 'yii\db\Connection',
            
            // common configuration for masters
            'masterConfig' => [
                'username' => 'root',
                'password' => 'admin',
                'attributes' => [
                    // use a smaller connection timeout
                    PDO::ATTR_TIMEOUT => 10,
                ],
            ],
            // list of master configurations
            'masters' => [
                ['dsn' => 'mysql:host=localhost;dbname=ptspdki_db'],
                ['dsn' => 'mysql:host=localhost;dbname=ptspdki_db'],
            ],
            
            // common configuration for slaves
            'slaveConfig' => [
                'username' => 'root',
                'password' => 'admin',
                'attributes' => [
                    // use a smaller connection timeout
                    PDO::ATTR_TIMEOUT => 10,
                ],
            ],
            // list of slave configurations
            'slaves' => [
                ['dsn' => 'mysql:host=localhost;dbname=ptspdki_db'],
            ],
        ],
//        'dbTrans' => [
//            'class' => 'yii\db\Connection',
//            'dsn' => 'mysql:host=localhost;dbname=ptspdki_db',
//            'username' => 'root',
//            'password' => '',
//            'charset' => 'utf8',
//            
//        ],
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
