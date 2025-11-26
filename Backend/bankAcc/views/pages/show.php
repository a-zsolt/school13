<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Számla részletei</h2>

    <div class="card" style="max-width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $account->getOwnerName() ?></h5>
            <p class="card-text"><?= $account->getAccountNumber() ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">ID: <?= $account->getId() ?></li>
            <li class="list-group-item">Egyenleg: <?= $account->getBalance() ?> Ft</li>
            <li class="list-group-item">Státusz:
                <?php if ($account->isDept()) : ?>
                    <span class="text-danger">Tartozás</span>
                <?php else: ?>
                    Rendben
                <?php endif; ?>
            </li>
        </ul>
        <div class="card-body d-flex justify-content-end gap-2">
            <a class="btn btn-success" href="index.php?action=deposit&id=<?= $account->getId(); ?>">
                Befizetés
            </a>
            <a class="btn btn-danger" href="index.php?action=withdraw&id=<?= $account->getId(); ?>">
                Kivétel
            </a>
        </div>
    </div>


<?php include __DIR__ . '/../layout/footer.php'; ?>