<?php
require_once __DIR__ . '/../config/config.php'; //asi toto je jediny sposob ako funguje relativna cesta

$host = DB_HOST;
$user = DB_USER;
$password = DB_PASSWORD;
$database = DB_NAME;

//$test_text = "";

$mysqli = new mysqli($host, $user, $password, $database);
// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}