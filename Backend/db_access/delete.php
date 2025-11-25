<?php

$id = $_GET["id"];

if ($id == null) {
    die("Torles sikertelen");
}

require 'db_connect.php';

try{
    $stmt = $pdo->prepare("DELETE FROM students WHERE id = :id");
    $stmt->execute(array(":id" => $id));
} catch (PDOException $e) {
    die("Torles sikertelen");
}

header("Location: index.php");