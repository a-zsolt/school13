<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db_connect.php";

    $name = $_POST['name'];
    $className = $_POST['className'];
    $grade = $_POST['grade'];

//    $sql = "INSERT INTO students (name, className, grade) VALUES ('$name', '$className', '$grade')";
//
//    $pdo->exec($sql);

    $stmt = $pdo->prepare("INSERT INTO students (name, className, grade) VALUES (?, ?, ?)");
    $stmt->execute([$name, $className, $grade]);

    echo "Diak mentve";

}
?>

<form method="POST" action="create.php">
    <label>Nev
        <input type="text" name="name" id="Nev"><br>
    </label>
    <label>
        Osztaly:
        <input type="text" name="className" value=""><br>
    </label>
    <label>
        Átlag:
        <input type="number" name="grade" value=""><br>
    </label>
    <button type="submit">
        Mentés
    </button>

</form>
