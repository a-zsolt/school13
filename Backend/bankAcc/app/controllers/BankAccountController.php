<?php

class BankAccountController
{
    private BankAccountRepository $repository;

    public function __construct()
    {
        $this->repository = new BankAccountRepository();
    }

    //Főoldal: listázás
    public function index()
    {
        $accounts = $this->repository->findAll();
        include __DIR__ . '/../../views/pages/index.php';
    }

    //Számla részletei
    public function show()
    {
        $id = (int)($_GET['id'] ?? -1);
        $account = $this->repository->findById($id);
        if (!$account) {
            http_response_code(404);
            echo "Számla nem található";
            return;
        }

        include __DIR__ . '/../../views/pages/show.php';
    }

    //Befizetés
    public function deposit()
    {
        $id = (int)($_GET['id'] ?? -1);
        $account = $this->repository->findById($id);
        if (!$account) {
            http_response_code(404);
            echo "Számla nem található";
            return;
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // fel dolgozzuk a kitöltött űrlapot

            $amount = (float)($_POST['amount'] ?? 0);

            if (!$account->deposit($amount)) {
                $error = "A befizetés összege legyen pozitív!";
            } else {
                $this->repository->update($account); //frissítés a db felé
                header('Location: index.php?action=show&id=' . $account->getId());
                exit;
            }
        }
        include __DIR__ . '/../../views/pages/deposit.php';
    }

    //Kivétel
    public function withdraw()
    {
        $id = (int)($_GET['id'] ?? -1);
        $account = $this->repository->findById($id);
        if (!$account) {
            http_response_code(404);
            echo "Számla nem található";
            return;
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = (float)($_POST['amount'] ?? 0);

            if (!$account->withdraw($amount)) {
                $error = "Nincs elég fedezet, vagy az összeg nem pozitív";
            } else {
                $this->repository->update($account);
                header('Location: index.php?action=show&id=' . $account->getId());
                exit;
            }
        }

        include __DIR__ . '/../../views/pages/withdraw.php';
    }


}