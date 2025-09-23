<?php
    $diakok = [
        [
            "id" => 1,
            "nev" => "Kiss Anna",
            "osztaly" => "10.A",
            "szuletesiEv" => 2008,
            "jegyek" => [5,4,1,5,4],
            "átlag" => 0
        ],
        [
            "id" => 2,
            "nev" => "Kiss Ádám",
            "osztaly" => "10.A",
            "szuletesiEv" => 2007,
            "jegyek" => [1,2,4,2,3],
            "átlag" => 0
        ],
        [
            "id" => 3,
            "nev" => "Lakatos Ármándó",
            "osztaly" => "10.C",
            "szuletesiEv" => 2008,
            "jegyek" => [4,3,2,2,3],
            "átlag" => 0
        ],
        [
            "id" => 4,
            "nev" => "Nagy Anna",
            "osztaly" => "10.A",
            "szuletesiEv" => 2006,
            "jegyek" => [5,5,5,5,5],
            "átlag" => 0
        ],
    ];

    // var_dump(array_keys($diakok[0]));
    $gradesSum = 0;
    $gradesDB = 0;
    $failsDB = 0;

    for ($i=0; $i < count($diakok); $i++) {
        $gradesSumStudent = 0.0;
        $gradesDBStudent = 0.0;

        foreach($diakok[$i]["jegyek"] as $grade){
            $gradesSum += $grade;
            $gradesDB++;

            if ($grade == 1) {
                $failsDB ++;
            }


            $gradesSumStudent += $grade;
            $gradesDBStudent++;
        }

        $diakok[$i]["átlag"] = $gradesSumStudent / $gradesDBStudent;
    }

    $bestSudent = "";
    $bestAVG = 0;

    for ($i=0; $i < count($diakok); $i++) {
        if ($diakok[$i]["átlag"] > $bestAVG) {
            $bestAVG = $diakok[$i]["átlag"];
            $bestSudent = $diakok[$i]["nev"];
        }
    }

?>

<!DOCTYPE html>
<html lang="hu" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer></script>
    <title>Mérés</title>
</head>
<body>
    <header class="p-3 pb-0 bg-info-subtle">
        <h1 class="fw-semibold text-info-emphasis">Mérés Eredmények</h1>
        <div class="d-flex gap-3">
            <p class="text-info-emphasis">Osztályátlag: <?= $gradesSum / $gradesDB ?></p>
            <p class="text-danger-emphasis">Elégtelen értékelések: <?= $failsDB ?></p>            
            <p class="text-success-emphasis">Legjobb tanuló: <?= $bestSudent ?></p>            
        </div>
    </header>
    <form class="row ps-sm-3 pe-sm-3 pb-md-2 pt-md-2 border-bottom border-top" style="background-color: #1d2024ff;">
        <div class="col-md-2">
            <div class="form-floating">
                <select class="form-select">
                    <option value="id">Id szerint</option>
                    <option value="átlag">Átlag szerint</option>
                </select>
                <label for="floatingSelect">Rendezés:</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <div class="form-floating">
                    <input class="form-control" placeholder="asd" id="floatingTextarea" name="floatingTextarea"></input>
                    <label for="floatingTextarea">Keresés név szerint</label>
                </div>
                <input class="btn btn-primary" type="submit" value="Keresés">
            </div>
        </div>
    </form>
    <table class="table table-hover">
        <thead>
            <?php foreach (array_keys($diakok[0]) as $key): ?>
                <th scope="col">
                    <?= $key ?>
                </th>
            <?php endforeach; ?>
            <th scope="col"></th>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($diakok); $i++): ?>
                <tr>
                    <?php $y = 0; foreach ($diakok[$i] as $data): ?>
                        <?php if($y == 0): ?>
                            <th scope="row">
                                <?= $data ?>
                            </th>
                        <?php elseif (is_array($data)): ?>
                            <td>
                                <p>
                                    <?php foreach ($data as $grade): ?>
                                        <?=$grade . " " ?>
                                    <?php endforeach; ?>
                                </p>
                            </td> 
                        <?php else: ?>
                            <td>
                                <?= $data ?>
                            </td>
                        <?php endif ?>
                    <?php $y++; endforeach; ?>
                    <td>
                        <input class="btn btn-info" type="button" value="Részletek">
                        <input class="btn btn-warning" type="button" value="JSON">
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</body>
</html>