<?php
/** EXAMPLE DB CONNECTION COMPONENT */ 
// 'db' => [
//     'class' => 'yii\db\Connection',
//     'dsn' => 'mysql:host=<ip>;dbname=<schema-name>',
//     'username' => '****',
//     'password' => '****',
//     'charset' => 'utf8',
// ],

return [
    'db' => [
        'class' => \yii\db\Connection::class,
        'dsn' => 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=ixion_main',
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'charset' => 'utf8',
    ],
];
