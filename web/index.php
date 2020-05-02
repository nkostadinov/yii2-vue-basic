<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG',  getenv('YII_DEBUG') === '0' ? false : true);
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV') === false ? 'dev' : getenv('YII_ENV'));

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
