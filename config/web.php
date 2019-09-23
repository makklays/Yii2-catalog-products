<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '90J723iWdWD4J07SgNAFZsh0r6rXGzvX',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',

                'category/<page:\d+>' => 'category/index',
                'category/create' => 'category/create',
                'category/update' => 'category/update',
                'category/delete' => 'category/delete',

                'category-view/<id:\d+>/<page:\d+>' => 'category/view',
                'product/create' => 'product/create',
                'product/update/<id:\d+>' => 'product/update',
                'product/delete' => 'product/delete',

                'product' => 'product/index', //

                'product-feedback/create/<prod_id:\d+>' => 'productfeedback/create',
                'product-feedback/update' => 'productfeedback/update',
                'product-feedback/delete' => 'productfeedback/delete',


                '<lang:>/category/<page:\d+>' => 'category/index',
                '<lang:>/category/create' => 'category/create',
                '<lang:>/category/update' => 'category/update',
                '<lang:>/category/delete' => 'category/delete',

                '<lang:>/category-view/<id:\d+>/<page:\d+>' => 'category/view',
                '<lang:>/product/create' => 'product/create',
                '<lang:>/product/update/<id:\d+>' => 'product/update',
                '<lang:>/product/delete' => 'product/delete',

                '<lang:>/product' => 'product/index', //

                '<lang:>/product-feedback/create/<prod_id:\d+>' => 'productfeedback/create',
                '<lang:>/product-feedback/update' => 'productfeedback/update',
                '<lang:>/product-feedback/delete' => 'productfeedback/delete',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
