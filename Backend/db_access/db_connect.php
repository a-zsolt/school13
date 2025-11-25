<?php

$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';

$pdo = null;

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
