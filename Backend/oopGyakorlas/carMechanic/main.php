<?php

require_once 'car.php';
require_once 'workSheet.php';

$cars = array();

$cars[] = new Car('ABC-123', 'Toyota', 'Corolla', 150000);
$cars[] = new Car('DEF-456', 'Honda', 'Civic', 120000);
$cars[] = new Car('GHI-789', 'Ford', 'Focus', 180000);
$cars[] = new Car('JKL-012', 'BMW', '320i', 90000);

$workSheets = array();
$workSheets[] = new workSheet(4120, $cars[0], 'Olajcsere', 25000);
$workSheets[] = new workSheet(4121, $cars[0], 'Fékellenőrzés', 10000);
$workSheets[] = new workSheet(4122, $cars[1], 'Légszűrő csere', 12000);
$workSheets[] = new workSheet(4123, $cars[1], 'Kerék kiegyensúlyozás', 15000);
$workSheets[] = new workSheet(4124, $cars[2], 'Vezérműszíj csere és futómű beállítás', 40000);
$workSheets[] = new workSheet(4125, $cars[3], 'Akkumulátor csere', 30000);

echo $workSheets[0]->endWork() . "\n";
echo $workSheets[2]->endWork() . "\n";
echo $workSheets[5]->endWork() . "\n";
echo $workSheets[1]->endWork() . "\n";

echo "\n=== Elkészült munkalapok összértéke áfával ===";
$totalWithAfa = 0;
foreach ($workSheets as $workSheet) {
    if ($workSheet->getStatus() === 'closed') {
        $totalWithAfa += $workSheet->calculateAfa();
    }
}
echo "\nÖsszeg: " . $totalWithAfa . " Ft\n";

echo "\n=== Összes nyitott munkalap ===\n";
foreach ($workSheets as $workSheet) {
    if ($workSheet->getStatus() === 'open') {
        echo $workSheet->getInfo() . "\n";
    }
}

echo "\n=== Összes szerelt autó ===\n";
foreach ($workSheets as $workSheet) {
    if ($workSheet->getStatus() === 'closed') {
        echo $workSheet->getCar()->carName() . "\n";
    }
}

