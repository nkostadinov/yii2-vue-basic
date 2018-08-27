<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 2018-08-20
 * Time: 20:47
 */

return [
    'name' => getenv('APPLICATION_NAME'),
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'authManager' => \insight\rbac\managers\BaseAuthManager::class,
        'taxonomy' => \nkostadinov\taxonomy\Taxonomy::class,
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ]
];