<?php

require_once 'bankAccount.php';

$bankAccounts = array();

$bankAccounts[] = new BankAccount(1001, "Kovács János", 5000);
$bankAccounts[] = new BankAccount(1003, "Szabó Péter", 0);
$bankAccounts[] = new BankAccount(1004, "Tóth Anna", 15000);

$bankAccounts[1]->deposit(2000); // Befizetés Szabó Péter számlájára
$bankAccounts[2]->deposit(3000); // Befizetés Tóth Anna számlájáról

$bankAccounts[0]->withdraw(1000); // Kivét Kovács János számlájáról
$bankAccounts[1]->withdraw(500);  // Kivét Szabó Péter számlájáról

echo "\n\n=== Sikertelen kivét (nincs elég egyenleg) ===";
$bankAccounts[1]->withdraw(2000); // Kivét Szabó Péter számlájáról

echo "\n\n=== Átutalás ===";
$bankAccounts[2]->transfer(4000, $bankAccounts[0]); // Átutalás Tóth Anna számlájáról Kovács János számlájára
echo "\nKovács János egyenlege: " . $bankAccounts[0]->getBalance() . " USD\n";

$bankAccounts[0]->transfer(70000, $bankAccounts[1]); // Sikertelen átutalás

echo "\n\n=== Számlaegyenlegek ===";
foreach ($bankAccounts as $account) {
    echo $account->getAccountInfo();
}

echo "\n\n=== Adósságban lévő számlák ===";
foreach ($bankAccounts as $account) {
    if ($account->isInDebt()) {
        echo "\n" . $account->getAccountHolder() . " adósságban van.\n";
    }
}


