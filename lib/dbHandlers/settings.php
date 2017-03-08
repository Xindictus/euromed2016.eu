<?php

return [
    'driver' => 'mysql',
    'host' => 'localhost',
    'port' => '3306',
    'username' => 'eam',
    'password' => 'eam',
    'database' => 'euromed2016',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'timezone' => 'Europe/Athens',
    'flags' => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_PERSISTENT => true
    ]
];
