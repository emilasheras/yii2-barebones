<?php
return [
    'db' => [
        'class' => \yii\db\Connection::class,
        'dsn' => 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname='.$_ENV['DB_NAME'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'charset' => 'utf8',
    ],
    // ... other databases here
];

//------------------------------------------------------------
// EXAMPLE DB CONNECTION 
//     'db' => [
//         'class' => 'yii\db\Connection',
//         'dsn' => 'mysql:host=<ip>;dbname=<schema-name>',
//         'username' => '****',
//         'password' => '****',
//         'charset' => 'utf8'
//     ],
//------------------------------------------------------------