<?php
if (YII_ENV_DEV) {
    $dotenv = new Dotenv\Dotenv('../');
    $dotenv->load();
}

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'bootstrap' => [
        'log',
        function () {
            return Yii::$app->getModule('user');
        },
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'czlWO0CWXothhsm8lzDVEDbavqAVDu1n',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'class' => nkostadinov\user\components\User::class,
            'identityClass' => app\models\User::class,
            'enableAutoLogin' => true,
            'allowUncofirmedLogin' => true,
            'passwordStrengthConfig' => [
                'min' => 6,
                'upper' => 0,
                'lower' => 0,
                'digit' => 0,
                'special' => 0,
                'hasUser' => false,
                'hasEmail' => true
            ],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [],
        ],
    ],
    'params' => $params,
    'modules' => [
        'user' => [
            'class' => \nkostadinov\user\Module::class,
        ],
        'api' => [
            'class' => \app\modules\api\Module::class,
        ],
        'taxonomy' => [
            'class' => \nkostadinov\taxonomy\Module::class
        ],
    ],
    'on beforeRequest' => function () {
        if (!Yii::$app->user->isGuest && (
                strpos($_SERVER['REQUEST_URI'], '/gii') !== 0 &&
                strpos($_SERVER['REQUEST_URI'], '/api') !== 0 &&
                strpos($_SERVER['REQUEST_URI'], '/logout') !== 0 &&
                strpos($_SERVER['REQUEST_URI'], '/taxonomy') !== 0 &&
                strpos($_SERVER['REQUEST_URI'], '/debug') !== 0
            )) {
            Yii::$app->catchAll = [
                'site/index',
            ];
        }
    },
];

$config = \yii\helpers\ArrayHelper::merge($config, require('common.php'));

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => [$_SERVER['REMOTE_ADDR']],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        'allowedIPs' => [$_SERVER['REMOTE_ADDR']],
    ];
}

return $config;
