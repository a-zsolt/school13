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
    <div class="container py-4">
        <p class="mb-3">Beküldött adatok JSON formátumban:</p>
        <pre class="p-3 bg-white border rounded"><code><?= htmlspecialchars($json) ?></code></pre>
        <a href="index.html" class="btn btn-primary mt-3">Vissza az űrlaphoz</a>
    </div>
</body>

</html>