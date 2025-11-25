<?php

$id = $_GET['id'];
if ($id == null) {
    die("404 - A tanulo nem talalhato");
}

require 'db_connect.php';
require 'Student.php';

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
$stmt->execute(['id' => $id]);

$student = $stmt->fetchObject('Student');

if ($student == null) {
    die("404 - Nem talalhato");
}

?>

<h2>Diak adatai</h2>

<table cellpadding="5" border="1">
    <tr>
        <th>ID</th>
        <td><?= $student->id?></td>
    </tr>
    <tr>
        <th>Név</th>
        <td><?= $student->name?></td>
    </tr>
    <tr>
        <th>Osztály</th>
        <td><?= $student->className?></td>
    </tr>
    <tr>
        <th>Átlag</th>
        <td><?= $student->grade?></td>
    </tr>
</table>
<a href="index.php">Vissza</a>
