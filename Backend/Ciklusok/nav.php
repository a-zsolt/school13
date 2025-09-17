<?php
    $menu_items = ["Home", "Products", "About", "Contact"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="p-5 d-flex justify-content-center">
    <ul class="list-group list-group-horizontal">
        <?php foreach($menu_items as $menu_item): ?>
            <li class="list-group-item">
                <a <?= "href= #". $menu_item ."" ?>> <?=  $menu_item ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
