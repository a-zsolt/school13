<?php
    $size = 40;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Összeadótábla</title>
</head>
<body class="p-3">
    <div class="col-sm-3">
        <table class="table table-bordered">
            <tr>
                <th>+</th>
                <?php for ($i = 1; $i <= $size; $i++): ?>
                    <th>
                        <?= $i ?>
                    </th>
                <?php endfor; ?>
            </tr>
    
            <?php for ($row=1; $row <= $size ; $row++):?>
                <tr>
                    <th><?= $row ?></th>
    
                    <?php for ($col=1; $col <= $size ; $col++):?>
                        <td>
                            <?= $row + $col ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
    </div>
</body>
</html>