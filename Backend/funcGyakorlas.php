<?php
declare(strict_types=1);

function minInt(int $num1, int $num2): int{
    if ($num1 < $num2) return $num1;
    return $num2;
}

echo minInt(1, 10) . "<br>";

function charNum(string $str): int {
    return strlen($str);
}

echo charNum("asdasd") . "<br>";

function evenOdd(int $num): bool {
    $evenOdd = $num % 2;

    if ($evenOdd == 0) {
        return true;
    }
    return false;
}

echo var_dump(evenOdd(2)) . "<br>";

function celsiusToFahrenheit(int $num): int {
    return ($num * 9/5) + 32;
}

echo celsiusToFahrenheit(5) . "<br>";

function firstLetter(string $str): string
{
    return substr($str, 0, 1);
}

echo firstLetter("asd");