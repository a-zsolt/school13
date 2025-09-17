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
            <div class="d-flex justify-content-center">
                <div class="col-md-2 ">
                    <label class="form-label" for="homerseklet">Hőmérséklet:</label>
                    <input class="form-control <?=  $is_valid ? 'is-invalid': ''?>" type="text" name="homerseklet" id="homerseklet">
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Beküldés">
            </div>
        </div>
        <?php 

        
            function checkFill($temp) {
                if ($temp === "") {
                    showAlert("Nincs megadva homerseklet!", "danger");
                    return false;
                } else if (!is_numeric($temp)){
                    showAlert("Csak számok lehetnek a mezőben!", "danger");
                    return false;
                }

                return true;
            }

            function category($temp) {
                if ($temp < 0) {
                    echo showAlert("Fagyos", "priamry");
                    return;
                } else if($temp <= 15) {
                    echo showAlert("Hűvös", "info");
                    return;
                } else if($temp <= 25) {
                    echo showAlert("Kellemes", "success");
                    return;
                } else if($temp > 25) {
                    echo showAlert("Meleg", "warning");
                    return;
                }
            }

            function showAlert($text, $color) {
                if ($color === "danger") {
                    echo '<div class="container col-sm-5 mt-3"><p class=" text-center p-3 text-'. $color .'-emphasis bg-'. $color .'-subtle border border-'. $color .'-subtle rounded-3">' . $text . '</p></div>';
                }else {
                    echo '<div class="container col-sm-3 mt-3"><p class=" text-center p-3 text-'. $color .'-emphasis bg-'. $color .'-subtle border border-'. $color .'-subtle rounded-3">' . $text . '</p></div>';
                }

            }

            if($_SERVER["REQUEST_METHOD"] === "POST") {
                $temp = $_POST['homerseklet'] ?? '';
                if (checkFill($temp)) {
                    $temp = (double)$temp;
                    category($temp);
                }                
            }



        ?>
    </form>
</body>
</html>