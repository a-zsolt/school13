<?php

class BankAccount 
{
    private readonly int $accountNumber;
    private $accountHolder;
    private $balance;

    public function __construct($accountNumber, $accountHolder, $initialBalance = 0) 
    {
        $this->accountNumber = $accountNumber;
        $this->accountHolder = $accountHolder;
        $this->balance = $initialBalance;
    }

    public function getAccountNumber() 
    {
        return $this->accountNumber;
    }

    public function getAccountHolder() 
    {
        return $this->accountHolder;
    }

    public function getBalance() 
    {
        return $this->balance;
    }

    public function deposit($amount) 
    {
        if ($amount > 0) {
            $this->balance += $amount;
        } else {
            echo "\nA befizetés összege pozitív kell legyen.\n";
        }
    }

    public function withdraw($amount) 
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "\nNincs elég egyenleg a művelet végrehajtásához vagy az összeg érvénytelen.\n";
        }
    }

    public function transfer($amount, BankAccount $targetAccount) 
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->withdraw($amount);
            $targetAccount->deposit($amount);
        } else {
            echo "\nNincs elég egyenleg a átutaláshoz vagy az összeg érvénytelen.\n";
        }
    }

    public function isInDebt()
    {
        return $this->balance < 0;
    }

    public function getAccountInfo() 
    {
        return "\nSzámlaszám: {$this->accountNumber}, Számlatulajdonos: {$this->accountHolder}, Egyenleg: {$this->balance}";
    }
}