<?php

require_once 'student.php';
require_once 'subject.php';

$school = array();

$school[] = new Student("Kovács Péter", "A12345", "2000-05-15");
$school[] = new Student("Nagy Anna", "B67890", "1999-11-30");
$school[] = new Student("Szabó Gábor", "C11223", "2001-02-20");

$school[] = new Subject("Matematika", 7, "Dr. Tóth László");
$school[] = new Subject("Fizika", 4, "Prof. Kiss Éva");
$school[] = new Subject("Informatika", 6, "Dr. Nagy János");
$school[] = new Subject("Történelem", 3, "Prof. Szűcs Mária");

echo "\nÖsszes diák és tantárgy adatai:\n";

foreach ($school as $item) {
    echo $item->getData() . "\n";
}

echo "\nKötelező tantárgyak:\n";
foreach ($school as $item) {
    if ($item instanceof Subject && $item->isItMandatory()) {
        echo $item->getData() . "\n";
    }
}

