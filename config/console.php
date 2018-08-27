<?php
if (YII_ENV_DEV) {
    $dotenv = new Dotenv\Dotenv(__DIR__.'/../');
    $dotenv->load();
}

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
    ],
    'params' => $params,
    'controllerMap' => [
        // Common migrations for the whole application
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => ['app\migrations'],
            'migrationPath' => [
                '@nkostadinov/taxonomy/migrations',
                '@yii/rbac/migrations',
                '@vendor/nkostadinov/yii2-user/migrations',
                'app/migrations',
            ],
        ],
    ],

];

$config = \yii\helpers\ArrayHelper::merge($config, require('common.php'));

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
