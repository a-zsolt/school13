<?php
require 'db_connect.php';
require 'student.php';

$sql = "SELECT * FROM students";
$stmt = $pdo->query($sql);

$students = $stmt->fetchAll(PDO::FETCH_CLASS, "student");

?>

<a href="create.php">
    Letrehozas
</a>

<table colpadding="5" border="1">
    <tr>
        <td>ID</td>
        <td>Nev</td>
        <td>Osztaly</td>
        <td>Jegy</td>
        <td>ToSring</td>
        <td>Muveletek</td>
    </tr>
    <?php foreach ($students as $student): ?>
    <tr>
        <td><?= $student->id; ?></td>
        <td><?= htmlspecialchars($student->name); ?></td>
        <td><?= htmlspecialchars($student->className); ?></td>
        <td><?= htmlspecialchars($student->grade); ?></td>
        <td><?= htmlspecialchars($student); ?></td>
        <td>
            <a href="show.php?id=<?= $student->id ?>">
                Megnyitas
            </a>
            <a href="delete.php?id=<?= $student->id ?>">
                Torles
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
