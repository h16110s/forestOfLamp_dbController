<?php
$dsn = 'mysql:host=XXXXXX;dbname=mytest;charset=utf8mb4';
$db_user = 'XXXXXXX';
$db_pass = 'XXXXXX';
$db_table_name = 'XXXXX';
$driver_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];
