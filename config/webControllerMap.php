<?php
/** Supposing this array can grow quite large, it is moved into its separate configuration file  
 * Path: config/webControllerMap.php
 * Also, it can be easily merged into the console configuration file, that uses most of the same routes.
*/
return [
    'migrate' => [
        'class' => 'yii\console\controllers\MigrateController',
        'migrationNamespaces' => [
            'app\migrations',
            // 'some\extension\migrations',
        ],
        //'migrationPath' => null, // allows to disable not namespaced migration completely
    ],
];
