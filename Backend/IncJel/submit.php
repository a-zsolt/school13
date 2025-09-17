<?php
date_default_timezone_set('Europe/Budapest');
$payload = [
    'submitted_at' => date('Y-m-d H:i:s T'),
    'post' => $_POST,
    'files' => $_FILES,
];

$json = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
<!doctype html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beküldött adatok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div>
            <h1>Bejelentés összefoglaló</h1>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <strong>Kategória: </strong><?php echo strtoupper($_POST['kat']) ?>
                        </div>
                        <div class="p-2">
                            <div class="mb-2">
                                <span class="badge text-bg-secondary me-1">Leltári szám: <?php echo strtoupper($_POST['leltariSz']) ?></span>
                                <span class="badge text-bg-secondary me-1">Pc név: <?php echo strtoupper($_POST['pcN']) ?></span>
                                <span class="badge text-bg-secondary me-1">Sor: <?php echo strtoupper($_POST['sor']) ?></span>
                                <span class="badge text-bg-secondary me-1">Szek: <?php echo strtoupper($_POST['szék']) ?></span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-12 col-lg-6">

            </div>
        </div>
    </div>

    <div class="container py-4">
        <p class="mb-3">Beküldött adatok JSON formátumban:</p>
        <pre class="p-3 bg-white border rounded"><code><?= htmlspecialchars($json) ?></code></pre>
        <a href="index.html" class="btn btn-primary mt-3">Vissza az űrlaphoz</a>
    </div>
</body>

</html>