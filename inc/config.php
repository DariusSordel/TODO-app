<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

require_once 'vendor/autoload.php';

$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'todo',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8'
]);