<?php

class BankAccount
{
    /***
     * @var int|null
     * Elsődleges kulcs -id
     */
    private ?int $id;

    /***
     * @var string Tulajdonos neve
     */
    private string $ownerName;

    /***
     * @var string Bankszámla száma
     */
    private string $accountNumber;

    /***
     * @var float|int Egyenleg
     */
    private float $balance;

    /***
     * @param string $ownerName
     * @param string $accountNumber
     * @param float $balance
     *
     * Bankszámla kezdő értékeke beállítása
     */
    public function __construct(?int $id, string $ownerName, string $accountNumber, float $balance = 0)
    {
        $this->id = $id;
        $this->ownerName = $ownerName;
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /***
     * @return string Tulajdonos nevének átadása
     */
    public function getOwnerName(): string
    {
        return $this->ownerName;
    }

    /***
     * @return string Bankszámla szám átadása
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /***
     * @return float Egyenleg átadása
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /***
     * @param float $amount
     * @return bool
     *
     * Pénz felvétel
     */
    public function withdraw(float $amount): bool
    {
        if ($amount <= 0) {
            return false;
        }

        if ($amount > $this->balance) {
            return false;
        }

        $this->balance -= $amount;
        return true;
    }

    /***
     * @param float $amount
     * @return bool
     *
     * Pénz befizetés
     */
    public function deposit(float $amount): bool
    {
        if ($amount <= 0) {
            return false;
        }

        $this->balance += $amount;
        return true;
    }

    /***
     * @param BankAccount $targetBankAccount
     * @param float $amount
     * @return bool
     *
     * Pénz átutalás
     */
    public function transfer(BankAccount $targetBankAccount, float $amount): bool
    {
        if ($amount <= 0) {
            return false;
        }

        if ($this->balance < $amount) {
            return false;
        }

        $this->balance -= $amount;
        $targetBankAccount->deposit($amount);
        return true;
    }

    /***
     * @return bool
     *
     * Van e tartozás a számlán
     */
    public function isDept(): bool
    {
        return  $this->balance < 0;
    }

}