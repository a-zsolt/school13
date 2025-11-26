<?php include __DIR__ . '/../layout/header.php'; ?>

<h1>Bankszámlák</h1>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Tulajdonos</th>
            <th>Számlaszám</th>
            <th>Egyenleg</th>
            <th>Állapot</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($accounts ?? [] as $account) : ?>
    <tr>
        <td><?= htmlspecialchars($account->getOwnerName()); ?></td>
        <td><?= htmlspecialchars($account->getAccountNumber()); ?></td>
        <td><?= htmlspecialchars($account->getBalance()) ?></td>
        <td>
            <?php if ($account->isDept()) : ?>
                <span class="text-danger">Tartozás</span>
            <?php else: ?>
                Rendben
            <?php endif; ?>
        </td>
        <td>
            <a class="btn btn-primary" href="index.php?action=show&id=<?= $account->getId(); ?>">
                Megnyitás
            </a>
            <a class="btn btn-success" href="index.php?action=deposit&id=<?= $account->getId(); ?>">
                Befizetés
            </a>
            <a class="btn btn-danger" href="index.php?action=withdraw&id=<?= $account->getId(); ?>">
                Kivétel
            </a>
        </td>
    </tr>

    <?php endforeach; ?>
    </tbody>
</table>


<?php include __DIR__ . '/../layout/footer.php'; ?>