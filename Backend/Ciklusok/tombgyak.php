<?php

$numbers = [23, 34, 234, 9438, 112];

echo $numbers[2];
echo "<br>";



$könyv = [
    "Title" => "Könyvecske",
    "Author" => "Buzi Csongi",
    "Year" => 2025
];


echo $könyv["Title"];
echo "<br>";

$könyvek = [
   "9780674730625" => ["Title" => "Könyvecske", "Author" => "Buzi Csongi", "Year" => 2025],
   "9780674730677" => ["Title" => "Könyvecske II", "Author" => "Buzi Csongi", "Year" => 2026],
   "6767676767676" => ["Title" => "Könyvecske III A kutja kalandai", "Author" => "Buzi Csongi", "Year" => 2077],
];

echo ''. $könyvek[6767676767676]["Author"]. ': ' . $könyvek[6767676767676]["Title"] . ', ' . $könyvek[6767676767676]["Year"] . '';

?>