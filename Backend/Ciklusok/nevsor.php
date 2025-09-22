<?php
    $students = [
        ["nev" => "Kiss Kata", "allapot" => "hianyzik"],
        ["nev" => "Nagy Péter", "allapot" => "jelen"],
        ["nev" => "Kendirck Lamar", "allapot" => "hianyzik"],
        ["nev" => "Baby Keem", "allapot" => "jelen"],
        ["nev" => "Jordan Carter", "allapot" => ""],
        ["nev" => "Kanye West", "allapot" => "kesik"],
        ["nev" => "Jacques Bermon Webster II", "allapot" => "jelen"],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Jelenlét</title>
</head>
<body>
    <div class="row p-3">
        <div class="col-md-5 col-xl-3 col-sm-12">
            <ul class="list-group">
                <?php foreach ($students as $key => $value): ?>
                    <li class="list-group-item">
                        <?php
                            if ($students[$key]["nev"] === "" || $students[$key]["allapot"] === "") {
                                echo "Nincs érték";
                            } else {
                                echo $students[$key]["nev"] . ': ' . $students[$key]["allapot"];
                            }
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>