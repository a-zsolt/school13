<?php

require_once 'product.php';

$warehouse = array();

$warehouse[] = new Product("Laptop", 1500, 10, "1234567890123");
$warehouse[] = new Product("Okostelefon", 800, 0, "9876543210987");
$warehouse[] = new Product("Tablet", 400, 5, "4567891234567");
$warehouse[] = new Product("Monitor", 300, 2, "3216549873216");
$warehouse[] = new Product("Billentyűzet", 50, 20, "1597534862587");

$warehouse[0]->addStock(5); // Laptop bevételezés

$warehouse[0]->removeStock(3); // Laptop eladás
$warehouse[2]->removeStock(1); // Tablet eladás

echo "\n\n=== Sikertelen eladás (nincs elég készlet) ===";
$warehouse[1]->removeStock(1); // Okostelefon eladás

echo "\n\n=== Raktárkészlet értéke ===";
$totalValue = 0;
foreach ($warehouse as $product) {
    $totalValue += $product->getPrice() * $product->getQuantity();
}
echo "\nA raktár teljes értéke: {$totalValue} USD\n";

echo "\n=== Elfogyott termékek ===";
foreach ($warehouse as $product) {
    if (!$product->isInStock()) {
        echo "\n" . $product->getProductName() . " elfogyott.\n";
    }
}