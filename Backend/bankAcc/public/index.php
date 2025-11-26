<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/models/BankAccount.php';
require_once __DIR__ . '/../app/models/BankAccountRepository.php';
require_once __DIR__ . '/../app/controllers/BankAccountController.php';

$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

$accountController = new BankAccountController();

switch ($actionName) {
    case 'index':
        $accountController->index();
        break;
    case 'show':
        $accountController->show();
        break;
    case 'deposit':
        $accountController->deposit();
        break;
    case 'withdraw':
        $accountController->withdraw();
        break;
    default:
        http_response_code(404);
        echo "Oldal nem található";
        break;
}