<?php

class BankAccountRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM bank_accounts ORDER BY owner_name');
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($data as $entity) {
            $result[] = new BankAccount(
                (int)$entity['id'],
                $entity['owner_name'],
                $entity['account_number'],
                (float)$entity['balance']
            );
        }

        return $result;
    }

    public function findById(int $id): ?BankAccount
    {
        $stmt = $this->db->prepare('SELECT * FROM bank_accounts WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $entity = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$entity) {
            return null;
        }

        return new BankAccount(
            (int)$entity['id'],
            $entity['owner_name'],
            $entity['account_number'],
            (float)$entity['balance']
        );
    }

    public function update(BankAccount $account): bool
    {
        $stmt = $this->db->prepare('
        UPDATE bank_accounts 
        SET balance = :balance
        WHERE id = :id
        ');

        return $stmt->execute([
            'balance' => $account->getBalance(),
            'id' => $account->getId()
        ]);
    }
}