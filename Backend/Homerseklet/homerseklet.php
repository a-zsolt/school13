<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer></script>
    <title>Homerseklet</title>
</head>
<body class="bg-light">
    <form method="POST">
        <div class="p-3 bg-white border rounded">
            <h1>Hőmérséklet megadás</h1>
        </div>
        <div class="container mt-3 vstack gap-3">
            <div>
                <label class="form-label" for="homerseklet">Hőmérséklet:</label>
                <input class="form-control" type="text" name="homerseklet" id="homerseklet">
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Beküldés">
            </div>
        </div>
        <?php 
            $temp = $_POST['homerseklet'];

            function checkFill($temp) {
                if ($temp === "") {
                    showAlert("Nincs megadva homerseklet!", true);
                    return false;
                } else if (!ctype_digit($temp)){
                    showAlert("Csak számok lehetnek a mezőben!", true);
                    return false;
                }

                return true;
            }

            function category($temp) {
                if ($temp < 0) {
                    echo showAlert("Fagyos", false);
                    return;
                } else if($temp < 15) {
                    echo showAlert("Hűvös", false);
                    return;
                } else if($temp < 25) {
                    echo showAlert("Kellemes", false);
                    return;
                } else if($temp > 25) {
                    echo showAlert("Meleg", false);
                    return;
                }
            }

            function showAlert($text, $error) {
                if (!$error) {
                    echo '<div class="container col-md-2 mt-3"><p class=" text-center p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">' . $text . '</p></div>';
                } else {
                    echo '<div class="container col-md-4 mt-3"><p class=" text-center p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">' . $text . '</p></div>';
                }
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (checkFill($temp)) {
                    $temp = (double)$temp;
                    category($temp);
                }                
            }
        ?>
    </form>
</body>
</html>