<?php
// ... Filter unwanted ips here

// Comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

// Load environment variables
($dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../'))->load();

$config = require __DIR__ . '/../config/config.php';
(new yii\web\Application($config))->run();