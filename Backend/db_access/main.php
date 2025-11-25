<?php

$dsn = 'mysql:host=localhost;dbname=test;charset=utf8';

$user = 'root';
$password = '';

$pdo = null;

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Kapcsolodas sikeres";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$sql = "SELECT * FROM `students`";

$stmt = $pdo->query($sql);

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($students[0]);


foreach ($students as $student) {
    echo PHP_EOL . $student['name'] . $student["className"] . $student["grade"] . PHP_EOL;
}

$stmt1 = $pdo->query($sql);
$students = $stmt1->fetchAll(PDO::FETCH_CLASS);

var_dump($students[0]->name);

echo $students[0]->name . ', ' . $students[0]->className . ', ' . $students[0]->grade;

foreach ($students as $student) {
    echo PHP_EOL . $student->name . $student->className . $student->grade . PHP_EOL;
}