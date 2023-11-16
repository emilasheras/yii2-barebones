<?php
$db = require(__DIR__ . '/db.php');

$config = [
    // the id of the application
    'id' => 'micro-app',

    // the basePath of the application will be the `micro-app` directory
    'basePath' => __DIR__.'/../',

    // this is where the application will find all controllers
    'controllerNamespace' => 'micro\controllers',

    // set an alias to enable autoloading of classes from the 'micro' namespace
    'aliases' => [
        '@micro' => __DIR__.'/../',
        
        '@bower' => '@vendor/bower-asset', // <- needed due to Yii2's use of bower instead of npm
    ],

    'components' => [
        /** REQUEST COMPONENT */
        'request' => [
            'cookieValidationKey' => $_ENV['COOKIE_VALIDATION_KEY'],
        ],

        /** ASSET MANAGER */

        /** DATABASES */
        'db' => $db['db'],
        // ... other dbs here

        /** CACHE */
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => 'redis' // id of the connection application component
        ],

        /** REDIS */
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => $_ENV['REDIS_HOST'],
            'port' => $_ENV['REDIS_PORT'],
            'database' => 0,
        ],

        /** SESSION */
        'session' => [
            'class' => 'yii\redis\Session',
            'redis' => [
                'hostname' => $_ENV['REDIS_HOST'],
                'port' => $_ENV['REDIS_PORT'],
                'database' => 0,
            ]
        ],

        /** URL MANAGER */
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
// other bootstrap code here
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        // uncomment and adjust the following to add your IP if you are not connecting from localhost
        'allowedIPs' => ['*','127.0.0.1', '::1'],
    ];
    
    // custom RBAC access via bootstrapping:
    // 'as access' => [ // Use 'as access' to apply the AccessControl filter
    //     'class' => 'yii\filters\AccessControl',
    //     'rules' => [
    //         [
    //             'allow' => true,
    //             'roles' => ['admin'], // Here 'admin' is an RBAC role
    //         ],
    //         // ... other rules ...
    //     ],
    // ],
}
return $config;