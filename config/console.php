<?php
$db = require(__DIR__ . '/db.php');
$webControllerMap = require(__DIR__ . '/webControllerMap.php');

$config = [
    // the id of the application
    'id' => 'console-app',

    // the basePath of the application will be the `micro-app` directory
    'basePath' => __DIR__.'/../',

    // this is where the application will find all controllers
    'controllerNamespace' => 'app\commands',

    // Set the app's timezone
    'timeZone' => $_ENV['TIMEZONE'],

    // set an alias to enable autoloading of classes from the 'micro' namespace
    'aliases' => [
        '@app' => __DIR__.'/../',
    ],

    'bootstrap' => ['log'], // Bootstrap components like 'log' if needed

    'components' => [
        /** LOGGING */
        'log' => [
            'targets' => [
                [
                    'logFile' => '@app/runtime/console/app.log',
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info', 'trace'],
                    'logVars' => [], // Don't log any variables by default. 
                    'traceLevel' => YII_DEBUG ? 3 : 0, // Log more info in debug mode
                    // 'logVars' => ['_GET', '_POST', '_FILES', '_SESSION'],
                ],

                // EXAMPLE EMAIL TARGET
                // REFERENCED FROM https://www.yiiframework.com/doc/guide/2.0/en/runtime-logging#log-targets
                // [
                //     'class' => 'yii\log\EmailTarget',
                //     'levels' => ['error'],
                //     'categories' => ['yii\db\*'],
                //     'message' => [
                //        'from' => ['log@example.com'],
                //        'to' => ['admin@example.com', 'developer@example.com'],
                //        'subject' => 'Database errors at example.com',
                //     ],
                // ],

            ],
        ],
    ],

    'controllerMap' => [
        // ... console specific controllers here
    ],

];
// databases are merged in from config/db.php
$config['components'] = array_merge($config['components'], $db);

// merge in the web specific config
$config['controllerMap'] = array_merge($config['controllerMap'], $webControllerMap);

return $config;