<?php

$host = "localhost";
$username = "root";
$password = "nopass";
$database = "merchant-commission";

$dsn = 'mysql:host=' . $host . ';dbname=' . $database . '';

global $pdo;

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}












