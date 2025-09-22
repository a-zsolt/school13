<?php
$timetable = [
    "Hétfő" => ["Matematika", "Magyar", "Történelem", "Backend"],
    "Kedd" => ["Fizika", "Angol", "Backend", "Backend", "Backend", "Backend"],
    "Szerda" => ["Backend", "Informatika", "Történelem", "Angol", "Osztályfőnöki"],
    "Csütörtök" => ["Irodalom", "Matematika", "Backend"],
    "Péntek" => ["Biológia", "Pénzügyi ismeretek", "Munkaügyi ismeretek", "Földrajz"]
];

$maxPeriods = 0;
foreach ($timetable as $subs) {
    $maxPeriods = max($maxPeriods, count($subs));
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Órarend</title>
</head>
<body class="p-3">
  <div class="col-sm-6">
    <table class="table table-bordered align-middle">
      <thead>
        <tr>
          <th></th>
          <?php foreach ($timetable as $day => $_): ?>
            <th><?= htmlspecialchars($day) ?></th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php for ($period = 0; $period < $maxPeriods; $period++): ?>
          <tr>
            <td><?= $period + 1 ?></td>
            <?php foreach ($timetable as $day => $subjects): ?>
              <td>
                <?php
                  
                  if ($subjects[$period] === "Backend") {
                    $element = '<p class=" text-danger fw-bold mb-0">' . htmlspecialchars($subjects[$period]) . '</p>';
                    echo isset($subjects[$period]) ? $element : "";
                    
                  } else {
                    echo isset($subjects[$period]) ? htmlspecialchars($subjects[$period]) : "";
                  }
                ?>
              </td>
            <?php endforeach; ?>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
